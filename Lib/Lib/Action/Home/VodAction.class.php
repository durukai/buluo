<?php
class VodAction extends HomeAction{
    // 影视搜索
    public function search(){
		//获取地址栏参数
		$Url = ff_param_url();
		//$JumpUrl传递分页及跳转参数
		$JumpUrl = ff_param_jump($Url);
		$JumpUrl['p'] = '{!page!}';
		C('jumpurl',UU('Home-vod/search',$JumpUrl,false,true));	
		C('currentpage',$Url['page']);
		//变量赋值
		$search = $this->Lable_Search($Url,'vod');
		$this->assign($search);
	//ajax搜索传递：
		        $cid = intval($_GET['cid']) ? intval($_GET['cid']) : 0;
            if($_GET[order])
                $s_order=$_GET[order]." DESC";
            else 
             $s_order="vod_addtime desc,vod_hits desc,vod_gold desc";
        $condition = 'wd:'.$search['search_wd'].';actor:'.$search['search_actor'].';limit:8;page:true;order:'.$s_order.';';
        if($cid > 0) {
            $condition .= ';cid:'.$cid;
        }

        $vod_list = ff_mysql_vod($condition);

        $page = $vod_list[0]['page'];
        $pagecount = $vod_list[0]['pagecount'];
        $pagetop = $vod_list[0]['pagetop'];
        $this->assign('page', $page);
        $this->assign('pagecount', $pagecount);
        $this->assign('pagetop', $pagetop);
        $this->assign('vod_list', $vod_list);

        if($this->isAjax()){
            $ajaxData = array(

                'ajaxtxt' => $this->fetch('pp_ajax_search'),
                'short_page' => $this->fetch('pp_ajax_page_top'),
                'long_page' => $this->fetch('pp_ajax_page_bottom'),
                'count' => $pagecount
            );
            $this->ajaxReturn($ajaxData);
        }
		//ajax搜索传递：
		$this->display($search['search_skin']);
    }			
    // 影视列表页
    public function show(){
		$Url = ff_param_url();
		$JumpUrl = ff_param_jump($Url);
		$JumpUrl['p'] = '{!page!}';	
		C('jumpurl',UU('Home-vod/show',$JumpUrl,false,true));
		C('currentpage',$Url['page']);
		$List = list_search(F('_ppvod/list'),'list_id='.$Url['id']);
		$channel = $this->Lable_Vod_List($Url,$List[0]);
		//类型变量 
		$mcat = D('Mcat')->list_cat($Url['id']);
		foreach ((array)$mcat as $k=>$v){
			$mcat[$k]['m_url'] = UU('Home-vod/show', array('id'=>$Url['id'],'mcid'=>$v['m_cid']),false,true);
		}
		$this->assign('mcat',$mcat);
		$this->assign($channel);
		if($Url['mcid']){
			$channel['list_skin'] = 'pp_vodlist';
			$nav = M('Mtype')->where("m_cid = {$Url['mcid']}")->find();
			$this->assign('nav_title',$nav['m_name']);
		}
		if($Url['picm']){
			$channel['list_skin'] = 'pp_vodlist';
		
		}
		if($Url['year']){
			$channel['list_skin'] = 'pp_vodlist';
		
		}
		if($Url['area']){
			$channel['list_skin'] = 'pp_vodlist';
		
		}
		if($Url['p'] > "1"){
			$channel['list_skin'] = 'pp_vodlist';
		
		}
		$this->display($channel['list_skin']);
    }
       // 多分类筛选
    public function type(){
		$Url = ff_param_url();
		$Type = $this->Lable_Vod_Type($Url);
		$this->assign($Type);
		$this->display($Type['type_skin']);
    }	
	// 影片内容页
    public function read(){
		$array_detail = $this->get_cache_detail( intval($_GET['id']) );
		if($array_detail){
			$this->assign($array_detail['show']);
			$this->assign($array_detail['read']);
			$this->display($array_detail['read']['vod_skin_detail']);
		}else{
			$this->assign("jumpUrl",C('site_path'));
			$this->error('此影片已经删除，请选择观看其它节目！');
		}
    }
	// 影片播放页
    public function play(){
		$array_detail = $this->get_cache_detail( intval($_GET['id']) );
		if($array_detail){
			$array_detail['read'] = $this->Lable_Vod_Play($array_detail['read'],array('id'=>intval($_GET['id']), 'sid'=>intval($_GET['sid']), 'pid'=>intval($_GET['pid'])));
			$this->assign($array_detail['show']);
			$this->assign($array_detail['read']);
			$this->display($array_detail['read']['vod_skin_play']);
		}else{
			$this->assign("jumpUrl",C('site_path'));
			$this->error('此影片已经删除，请选择观看其它节目！');
		}
    }
	
	     /*
     * 口水页面
     *
     * 需要下拉异步载入(后期)
     */
    public function koushui() {
        $cm_cids = array();
        $cm = D('Cm');
        $cmCidData = $cm->field('cm_cid')->group('cm_cid')->order('cm_id DESC')->select();
        if($cmCidData) {
            foreach ($cmCidData as $v) {
                $cm_cids[] = $v['cm_cid'];
            }
        } else {
            $this->error('目前没有评论');
        }
        $vod = D('Vod');
        $vod_list = $vod->where(
                        array('vod_id' => array('in',$cm_cids))
                    )->select();
        foreach ($vod_list as $k => $val) {
			
			$cm_list = $this->get_cm_list($val['vod_id']);
			if(count($cm_list) == 0) {
				
				unset($vod_list[$k]);
				continue;
			} else {
				$vod_list[$k]['comment'] = $cm_list;
            $vod_list[$k]['surplus_comment'] = $this->get_surplus_cm($val['vod_id']);
			}   
        }
        $this->assign('vod_list', $vod_list);
        $this->display('pp_koushui');
    }
    /*
     * 读取部分评论
     */
    private function get_cm_list($vod_id) {
        return D('Cm')->field('cm_nickname,cm_content')->where(array('cm_cid' => $vod_id, 'cm_status' => 1))->limit(10)->select();
    }
    private function get_surplus_cm($vod_id) {
        $count = D('Cm')->where(array('cm_cid' => $vod_id, 'cm_status' => 1))->count();
        return $count;
    }
	
	
	// 从数据库获取数据
	private function get_cache_detail($vod_id){
		if(!$vod_id){ return false; }
		//优先读取缓存数据
		if(C('data_cache_vod')){
			$array_detail = S('data_cache_vod_'.$vod_id);
			if($array_detail){
				return $array_detail;
			}
		}
		//未中缓存则从数据库读取
		$where = array();
		$where['vod_id'] = $vod_id;
		$where['vod_cid'] = array('gt',0);
		$where['vod_status'] = array('eq',1);
		$rs = D("Vod");
		$array = $rs->where($where)->relation('Tag')->find();
		if($array){
			//解析标签
			$array_detail = $this->Lable_Vod_Read($array);
			if( C('data_cache_vod') ){
				S('data_cache_vod_'.$vod_id, $array_detail, intval(C('data_cache_vod')));
			}
			return $array_detail;
		}
		return false;
	}
}
?>
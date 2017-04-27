<?php
/*****************后台公用类库 继承全站公用类库*******************************/
class BaseapiAction extends AllAction{
	//构造
    public function _initialize(){
	    parent::_initialize();
		include_once('555vps.php');
		if($config_555vps['pass']!=$_REQUEST['pass'])
		{
			$this->error('密码错误');
		}
		//检查登录
		$_SESSION[C('USER_AUTH_KEY')] =1;
		$_SESSION['admin_name'] = 'admin';
		$_SESSION['admin_ok'] = '1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1,1';

    }		
	//生成播放器列表
    public function ppvod_play(){
	    $this->assign('countplayer',count(C('PP_PLAYER')));
		$this->assign('playtree',C('play_player'));
    }	
	//生成前台分类缓存
    public function ppvod_list(){
		$rs = D("List");
		$where['list_status'] = array('eq',1);
		$list=$rs->where($where)->order('list_oid asc')->select();
		foreach($list as $key=>$val){
			if ($list[$key]['list_sid'] == 9){
				$list[$key]['list_url'] = $list[$key]['list_jumpurl'];
				$list[$key]['list_url_big'] = $list[$key]['list_jumpurl'];
			}else{
				$list[$key]['list_url'] = ff_list_url(getsidname($list[$key]['list_sid']),array('id'=>$list[$key]['list_id']),1);
				$list[$key]['list_url_big'] = ff_list_url(getsidname($list[$key]['list_sid']),array('id'=>$list[$key]['list_pid']),1);
				$list[$key]['list_name_big'] = getlistname($list[$key]['list_pid']);
				if($list[$key]['list_sid'] == 1){
					$list[$key]['list_limit'] = gettplnum('ff_mysql_vod\(\'(.*)\'\)',$list[$key]['list_skin']);
				}else{
					$list[$key]['list_limit'] = gettplnum('ff_mysql_news\(\'(.*)\'\)',$list[$key]['list_skin']);
				}
			}
		}
		//$list[999]['special'] = get_tpl_limit('<bdlist(.*)limit="([0-9]+)"(.*)>','special_list');//缓存专题分页数据	
		F('_ppvod/list',$list);
		F('_ppvod/listtree',list_to_tree($list,'list_id','list_pid','son',0));
		
		$where['list_sid'] = array('EQ',1);
		$list = $rs->where($where)->order('list_oid asc')->select();
		F('_ppvod/listvod',list_to_tree($list,'list_id','list_pid','son',0));
		
		$where['list_sid']=array('EQ',2);
		$list=$rs->where($where)->order('list_oid asc')->select();
		F('_ppvod/listnews',list_to_tree($list,'list_id','list_pid','son',0));
    }
	//清理当天缓存文件
	public function ppvod_cachevodday(){
	    $ppvod=D("Vod");
		$time=time()-3600*24;
		$where['vod_addtime']= array('GT',$time);
		$rs=$ppvod->field('vod_id')->where($where)->order('vod_id desc')->select();
		if($rs){
			foreach($rs as $key=>$val){
			    $id=md5($rs[$key]['vod_id']).c('html_file_suffix');
			    @unlink('./Html/Vod_read/'.$id);
				@unlink('./Html/Vod_play/'.$id);
			}
		    import("ORG.Io.Dir");
			$dir=new Dir;
			if(!$dir->isEmpty('./Html/Vod_show')){$dir->delDir('./Html/Vod_show');}	
			if(!$dir->isEmpty('./Html/Ajax_show')){$dir->delDir('./Html/Ajax_show');}
			@unlink('./Html/index'.c('html_file_suffix'));						
		}
	}	
}
?>
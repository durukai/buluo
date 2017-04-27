<?php
class CollectAction extends BaseAction{	
/*****官方一键采集功能完毕******************************/

	// 自定义采集管理
    public function show(){
	    $user=D("Admin.Collect");
		$list=$user->order('collect_id desc')->select();
		$this->assign('list',$list);
		$this->assign('page',$show);
        $this->display('./Public/system/collect_show.html');
    }
	// 添加编辑采集
    public function add(){
		$collect=D("Admin.Collect");
		$array=array();
		$collect_id=$_GET['collect_id'];
		if($collect_id>0){
            $where['collect_id']=$collect_id;// 设置查询条件段
			$array=$collect->where($where)->find();
			$array['collect_replace']=explode('|||',$array['collect_replace']);
		}else{
		    $array['collect_id']=0;
		    $array['collect_encoding']='2312';
			$array['collect_player']='qvod';
			$array['collect_savepic']=0;
			$array['collect_order']=0;
			$array['collect_pagetype']=1;
			$array['collect_pagesid']=1;
			$array['collect_pageeid']=9;
		}
		$this->ppvod_play();
		$this->assign($array);
		$this->assign('listtree',F('_ppvod/listvod'));
		$this->display('./Public/system/collect_add.html');
    }
	
	// 新增数据
	public function insert() {
		$Form=D("Admin.Collect");
		if($Form->create()){
		    $vo=$Form->add();
			if(false!==$vo){
			    $this->f_replace($_POST['collect_replace'],$vo);
			    $this->assign("jumpUrl",'index.php?s=Admin-Collect-Ing-collect_id-'.$vo.'-tid-2');
				$this->success('数据添加成功,马上测试一下是否能正常采集！');
			}else{
				$this->error('数据写入错误');
			}
		}else{
		    $this->error($Form->getError());
		}
	}	
	
	// 更新数据
	public function update(){
		if(empty($_POST['collect_savepic'])) $_POST['collect_savepic']=0;
		if(empty($_POST['collect_order'])) $_POST['collect_order']=0;
		$Form=D("Admin.Collect");
		if($Form->create()){
			if(false!==$Form->save()){
				F('_collects/cid_'.$_POST['collect_id'],NULL);
				F('_collects/cid_'.$_POST['collect_id'].'_rule',NULL);
				$this->f_replace($_POST['collect_replace'],$_POST['collect_id']);
				$this->assign("jumpUrl",'index.php?s=Admin-Collect-Ing-collect_id-'.$_POST['collect_id'].'-tid-2');
				$this->success('数据更新成功,马上测试一下是否能正常采集！');
			}else{
				$this->error("没有更新任何数据!");
			}
		}else{
			$this->error($Form->getError());
		}
	}
	// 复制数据
    public function cop(){
	    $collect=D("Admin.Collect");
		$collect_id=$_GET['collect_id'];
		$rs=$collect->find($collect_id);
		unset($rs["collect_id"]);
		$rs["collect_title"]=$rs["collect_title"].'-复制';
		$collect->data($rs)->add();
		$this->success('成功复制一条采集规则！');
    }	
	
	// 删除数据
    public function del(){
		$collect=D("Admin.Collect");
		$collect_id=$_GET['collect_id'];
		$where['collect_id']=$collect_id;
		$collect->where($where)->delete();
		F('_collects/cid_'.$collect_id.'_rule',NULL);
		F('_collects/cid_'.$collect_id.'_replace',NULL);
		$this->success('成功删除一条ID为'.$collect_id.'的数据！');
    }	
	
	// 批量删除数据
    public function delall(){
		$collect=D("Admin.Collect");
		foreach($_POST['collect_id'] as $value){
		    $collect->where('collect_id='.$value)->delete();
			F('_collects/cid_'.$value.'_rule',NULL);
			F('_collects/cid_'.$value.'_replace',NULL); 
		}
		$this->success('批量删除数据成功！');
    }
	
	// 组合采集列表+批量采集数据
    public function ing(){
		$where['collect_id']=$_REQUEST['collect_id'];
		if(is_array($where['collect_id'])){
			$gid='1,'.implode(',',$where['collect_id']);
			$where['collect_id']=$where['collect_id'][0];
		}else{
			$gid=$_GET['gid'];
		}
		$collect=D("Admin.Collect");
		if($rs=$collect->where($where)->find()){
		    //生成匹配规则($rule)
			$rule=array();
			foreach($rs as $key =>$val){
			    if(strpos($val,'[$ppvod]')>0){$rule[$key]=getrole($val);}else{$rule[$key]=$val;}
			}
			//生成采集范围($listurl)
			if($rs['collect_pagetype']==2||$rs['collect_pagetype']==3){
				for($i=0;$i<=abs(intval($rs['collect_pagesid']-$rs['collect_pageeid']));$i++){
				    $listurl[$i]=str_replace('[$ppvod]',$i+$rs['collect_pagesid'],$rs['collect_pagestr']);
				}
			}elseif($rs['collect_pagetype']==1||$rs['collect_pagetype']==4){
			    $listurl=explode(chr(13),$rs['collect_liststr']);
			};
			//是否倒序($listurl)
			if(1==$rs['collect_order'])$listurl=getreurl($listurl);
			//生成缓存
			F('_collects/cid_'.$where['collect_id'],$listurl);
			F('_collects/cid_'.$where['collect_id'].'_rule',$rule);
			//规则写好后测试一个
			if(2==$_GET['tid']){
				$this->ingtest($where['collect_id'],$rs['collect_pagetype']);				
			}
			//判断采集方式开始采集	sid=start eid=end tid=test gid=nextcollect
			if($rs['collect_pagetype']==1||$rs['collect_pagetype']==2){
				$collect_url='index.php?s=Admin-Collect-Ingbylist-cid-'.$where['collect_id'].'-sid-0-eid-'.count($listurl).'-tid-'.$_GET['tid'].'-gid-'.$gid.'.html';
			}elseif($rs['collect_pagetype']==3||$rs['collect_pagetype']==4){
			    $collect_url='index.php?s=Admin-Collect-Ingbyid-cid-'.$where['collect_id'].'-sid-0-eid-'.count($listurl).'-tid-'.$_GET['tid'].'-gid-'.$gid.'.html';
			}
			header("Location: ".$collect_url."");
		}else{
		    $this->error('未查询到相关记录!');
		}
    }
	
	//判断与处理下一个采集节点转向地址
	public function checknext($string){
		if(!empty($string)){
			$gid=explode(',',$string);
			$collect_nowid=$gid[0];
			$gid[0]=$collect_nowid+1;
			$collect_nexturl='index.php?s=Admin-Collect-Ing-collect_id-'.$gid[$gid[0]];	
			$collect_count=count($gid)-1;
			$gid=implode(',',$gid);
			$collect_nexturl=$collect_nexturl.'-gid-'.$gid;//生成下一个采集节点地址
			if($collect_nowid==$collect_count){
				if(c('url_html')){
					header("Location: index.php?s=Admin-Html-Showvod-did-1-gid-1");//生成当天静态
				}else{
					if(c('html_cache_on')){
					header("Location: index.php?s=Admin-Cache-Vodday");//清空当天缓存
					}
				}
			}else{
				header("Location: ".$collect_nexturl."");
			}
		}
	}
	
	//按分页采集
	public function ingbylist(){
	    $go=$_GET;
	    $listurl=F('_collects/cid_'.$go['cid']);
		$rule=F('_collects/cid_'.$go['cid'].'_rule');
		$this->assign($go);
		if(false!==$listurl&&false!==$rule){
		    if($go['sid']<$go['eid']){
				$listurl=trim($listurl[$go['sid']]);
				$html=getfile($listurl);
				if("utf-8"<>$rule['collect_encoding'])$html=g2u($html);
				//缩小列表范围
				if(!empty($rule['collect_listurlstr'])){
					$html=getvoddata($html,$rule['collect_listurlstr']);
				}
				//列表页采集图片
				if(!empty($rule['collect_listpicstr'])){
					$arraypic=getvodall(trim($html),$rule['collect_listpicstr']);
				}
				$array=getvodall(trim($html),$rule['collect_listlink']);
				if(1==$rule['collect_order']){$array=getreurl($array);$arraypic=getreurl($arraypic);}//倒序
				$this->assign("count",count($array));
				$i=1;
				foreach($array as $key=>$val){
					$this->assign($this->ingbymdb(getbaseurl($listurl,trim($val)),$rule,trim($arraypic[$key]),$go['tid']));
					$this->assign("listurl",$listurl);
					$this->assign("listi",$i);
					$i=$i+1;
					$this->display('./Public/system/collectinglist.html');
				}
				$this->display('./Public/system/collectinglistgo.html');
			}else{
				F('_collects/cid_'.$go['cid'],NULL);
				F('_collects/cid_'.$go['cid'].'_rule',NULL);
				$this->checknext($go['gid']);				
				$this->assign("jumpUrl",'index.php?s=Admin-Vod-Show-vod_cid-0');
				$this->success('恭喜你！所有采集任务成功完成！<br><br>点此查看一些相似的影片是否需要入库！');
			}
		}else{
			$this->error("没有相关采集数据！");
		}
	}	
	
	//按ID采集
	public function ingbyid(){
	    $go=$_GET;
	    $listurl=F('_collects/cid_'.$go['cid']);
		$rule=F('_collects/cid_'.$go['cid'].'_rule');
		$this->assign($go);
		if(false!==$listurl&&false!==$rule){
		    if($go['sid']<$go['eid']){
				$this->assign($this->ingbymdb(trim($listurl[$go['sid']]),$rule,'',$go['tid']));
				$this->display('./Public/system/collectingid.html');
			}else{
				F('_collects/cid_'.$go['cid'],NULL);
				F('_collects/cid_'.$go['cid'].'_rule',NULL);
				$this->checknext($go['gid']);
				$this->assign("jumpUrl",'index.php?s=Admin-Vod-Show-vod_cid-0');
				$this->success('恭喜你！所有采集任务成功完成！<br><br>点此查看一些相似的影片是否需要入库！');
			}
		}else{
		    $this->error("没有相关采集数据！");
		}	
	}
	
	//处理采集内容并入库		
	public function ingbymdb($url,$rule,$listpic='',$tid=''){
	    $replace=F('_collects/cid_'.$rule['collect_id'].'_replace');//获取过滤规则
		$url=preg_replace($replace['all']['patterns'],$replace['all']['replaces'],$url);
	    $vod=array();
		$html=getfile($url);
		if(false!==$html){
		    if("utf-8"<>$rule['collect_encoding'])$html=g2u($html);
			$vod['vod_cid']=$rule['collect_cid'];
			if(0==$vod['vod_cid']){
				$vod['vod_cid']=preg_replace($replace['listname']['patterns'],$replace['listname']['replaces'],trim(getvoddata($html,$rule['collect_listname'])));
				$vod['vod_cid']=getlistid($vod['vod_cid']);
			}
		    $vod['vod_name']=trim(getvoddata($html,$rule['collect_name']));
			  $vod['vod_name']=preg_replace($replace['vodname']['patterns'],$replace['vodname']['replaces'],$vod['vod_name']);
			  
			  		    $vod['vod_title']=trim(getvoddata($html,$rule['collect_titlee']));
			  $vod['vod_title']=preg_replace($replace['titlee']['patterns'],$replace['titlee']['replaces'],$vod['vod_title']);
			  
			  
			  $vod['vod_keywords']=getvoddata($html,$rule['collect_keywords']);
			  $vod['vod_keywords']=preg_replace($replace['keywords']['patterns'],$replace['keywords']['replaces'],$vod['vod_keywords']);
			  
		    $vod['vod_actor']=getvoddata($html,$rule['collect_actor']);
			  $vod['vod_actor']=preg_replace($replace['actor']['patterns'],$replace['actor']['replaces'],$vod['vod_actor']);
			  
		    $vod['vod_director']=getvoddata($html,$rule['collect_director']);
			  $vod['vod_director']=preg_replace($replace['director']['patterns'],$replace['director']['replaces'],$vod['vod_director']);
		    $vod['vod_content']=getvoddata($html,$rule['collect_content']);
			  $vod['vod_content']=preg_replace($replace['content']['patterns'],$replace['content']['replaces'],$vod['vod_content']);
			  if(true==C('play_collect')){$vod['vod_content']=getrandstr($vod['vod_content']);}
			if($listpic){
			  $vod['vod_pic']=getbaseurl($url,$listpic);
			}else{
		    $vod['vod_pic']=getvoddata($html,$rule['collect_pic']);
			  $vod['vod_pic']=getbaseurl($url,str_replace($arr[0][0],$arr[0][1],$vod['vod_pic']));
			}
			  $vod['vod_pic']=preg_replace($replace['vodpic']['patterns'],$replace['vodpic']['replaces'],$vod['vod_pic']);
		    $vod['vod_area']=getvoddata($html,$rule['collect_area']);
			  $vod['vod_area']=preg_replace($replace['all']['patterns'],$replace['all']['replaces'],$vod['vod_area']);
		    $vod['vod_language']=getvoddata($html,$rule['collect_language']);
			  $vod['vod_language']=preg_replace($replace['all']['patterns'],$replace['all']['replaces'],$vod['vod_language']);
			$vod['vod_savepic']=$rule['collect_savepic'];
		    $vod['vod_year']=getvoddata($html,$rule['collect_year']);
		    $vod['vod_continu']=getvoddata($html,$rule['collect_continu']);
			  $vod['vod_continu']=preg_replace($replace['continu']['patterns'],$replace['continu']['replaces'],$vod['vod_continu']);if(empty($vod['vod_continu'])){$vod['vod_continu']=0;}
			$vod['vod_addtime']=time();
			$vod['vod_inputer']='collect'.$rule['collect_id'];
			$vod['vod_stars']=1;
			$vod['vod_letter']=getfirstchar($vod['vod_name']);
			$vod['vod_play']=$rule['collect_player'];
			$vod['vod_reurl']=$url;
			if(!empty($rule['collect_urlstr'])){//缩小地址范围
				$html=getvoddata($html,$rule['collect_urlstr']);
			}
			if(!empty($rule['collect_urlname'])){//分集名
			    $arrname=getvodall(trim($html),$rule['collect_urlname']);
			}
			$arrurl=getvodall(trim($html),$rule['collect_urllink']);
			$playurl='';
			foreach($arrurl as $key=>$val){
			    if(is_array($arrname)){$playname=$arrname[$key].'$';}else{$playname='';}
			    if(!empty($rule['collect_url'])){
					$val=preg_replace($replace['url']['patterns'],$replace['url']['replaces'],$val);
					$html=getfile(getbaseurl($url,$val));
					if("utf-8"<>$rule['collect_encoding'])$html=g2u($html);
					$playurl=$playurl.chr(13).$playname.trim(getvoddata($html,$rule['collect_url']));
				}else{
				    $playurl=$playurl.chr(13).$playname.trim($val);
				}
			}
		    $vod['vod_url']=trim(preg_replace($replace['url']['patterns'],$replace['url']['replaces'],$playurl));
			//处理是否写入数据
				$cai = D('Xml');
				$vod['vod_state'] = $cai->xml_insert($vod,false);
				return $vod;
									
		}else{
			//$this->error('采集xx页面出现异常!');
		}
	
	}
	
	//定时采集
	public function dingshi(){
	if(in_array(date("w"),$_POST['collect_week'])){
		if(in_array(date("H"),$_POST['collect_hour'])){
			$gid=implode(',',$_REQUEST['collect_id']);
			$gid='index.php?s=Admin-Collect-Ing-collect_id-'.$_REQUEST['collect_id'][0].'-gid-1,'.$gid;
		}
	}
	$this->assign('gid',$gid);
	$this->display('./Public/system/collect_dingshi.html');
	}
	
	// 写入替换规则缓存
    public function f_replace($rearr,$collectid){
		foreach($rearr as $i=>$v1){
		    $arr1=array();$arr2=array();
			foreach(explode(chr(13),trim($v1)) as $j=>$v){
				list($key,$val)=explode('$$$',trim($v));
				$arr1[$j]='/'.trim(stripslashes($key)).'/si';
				$arr2[$j]=trim($val);
			}
			$arr[$i]=array('patterns'=>$arr1,'replaces'=>$arr2);
		}				
		F('_collects/cid_'.$collectid.'_replace',$arr);
		return $arr;
		/*foreach($array as $i=>$val){
			foreach (explode(chr(13),$val) as $key=>$v){
			    list($key,$val)=explode('$$$',trim($v));
			    $arr[$i][trim($key)]=trim($val);
			}
		}*/		   
	}
	
	//规则写完后测试是否正确
    public function ingtest($cid,$type){
	    $listurl=F('_collects/cid_'.$cid);
		$rule=F('_collects/cid_'.$cid.'_rule');
		end($listurl);
		$testurl=trim($listurl[key($listurl)]);
	    if($type==3||$type==4){
		    $test=$this->ingbymdb($testurl,$rule,'',2);
		}else{
			$html=getfile($testurl);
			if("utf-8"<>$rule['collect_encoding'])$html=g2u($html);		
			if(!empty($rule['collect_listurlstr'])){$html=getvoddata($html,$rule['collect_listurlstr']);}
			if(!empty($rule['collect_listpicstr'])){$arraypic=getvodall(trim($html),$rule['collect_listpicstr']);}
			$array=getvodall(trim($html),$rule['collect_listlink']);
			if(1==$rule['collect_order']){$array=getreurl($array);$arraypic=getreurl($arraypic);}
			end($array);
			$urlid=getbaseurl($testurl,trim($array[key($array)]));
			end($arraypic);
			$urlpic=trim($arraypic[key($arraypic)]);
			$test=$this->ingbymdb($urlid,$rule,$urlpic,2);
		}
		F('_collects/cid_'.$go['cid'],NULL);
		F('_collects/cid_'.$go['cid'].'_rule',NULL);		
		$this->assign($test);
		$this->display('./Public/system/collectingtest.html');
		exit();
	}	
	// 采集导出
    public function export(){
	    $rs=D("Admin.Collect");
		$list=$rs->order('collect_id desc')->select();
		$this->assign('list',$list);
        $this->display('./Public/system/collectmain_export.html');
    }		
	//执行采集导出
    public function exportsql(){
	    if(!is_array($_POST['id'])){$this->error("请选择要导出的规则！");}
	    $where['collect_id']=array('in',$_POST['id']);;
	    $rs=D("Admin.Collect");
		$list=$rs->where($where)->order('collect_id desc')->select();	
		F('_collects/ppvod_collect',$list);
        $this->success("恭喜您！您选择的采集规则已经完整导出！");
    }			
	// 采集导入
    public function import(){
		$list=F('_collects/ppvod_collect');
		if(!is_array($list)){$this->error("没有找到采集规则文件Runtime/Data/_collects/ppvod_collect.php！");}
		$this->assign('list',$list);
        $this->display('./Public/system/collectmain_import.html');
    }	
	//执行采集导入
    public function importsql(){
	    $id=$_POST['id'];
		if(!is_array($id)){$this->error("请选择要导入的规则！");}
		$list=F('_collects/ppvod_collect');
		$rs=D("Admin.Collect");
		$replace=array('all'=>'','listname'=>'','keywords'=>'','vodname'=>'','titlee'=>'','actor'=>'','director'=>'','content'=>'','vodpic'=>'','continu'=>'','url'=>'');
		foreach($list as $key=>$val){
		    if(in_array($val['collect_id'],$id)){
				unset($val['collect_id']);
				$cid=$rs->data($val)->add();
				$abc=explode('|||',$val['collect_replace']);
				$replace=array();
				$replace['all']=$abc[0];
				$replace['listname']=$abc[1];
				$replace['keywords']=$abc[2];
				$replace['vodname']=$abc[3];
				$replace['titlee']=$abc[4];
				$replace['actor']=$abc[5];
				$replace['director']=$abc[6];
				$replace['content']=$abc[7];
				$replace['vodpic']=$abc[8];
				$replace['continu']=$abc[9];
				$replace['url']=$abc[10];
				$this->f_replace($replace,$cid);
			};
		}
		$this->assign("jumpUrl",'index.php?s=Admin-Collect-Show');
		$this->success("恭喜您！您选择的采集规则已经成功导入！");
    }				
}
?>
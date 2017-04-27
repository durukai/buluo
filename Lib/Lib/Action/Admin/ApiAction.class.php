<?php



class ApiAction extends BaseapiAction{







	//获取分类



	public function getcate()



	{



		$rs = F('_ppvod/listvod');



		$select_start='<select name="vod_cid" id="vod_cid" style="width:100px">';



		$select_option='';



		foreach($rs as $c){



			if(isset($c['son']))



			{



				foreach($c['son'] as $s)



				{



					$select_option=$select_option.'<option value="'.$s['list_id'].'">'.$c['list_name'].'---'.$s['list_name'].'</option>';



				}



			}



			else



			{



				$select_option=$select_option.'<option value="'.$c['list_id'].'">'.$c['list_name'].'</option>';



			}



		}



		$select_end='</select>';



		$select=$select_start.$select_option.$select_end;



		print_r($select);exit;



	}



	// 影片列表



    public function show(){



		$admin = array();



		//获取地址栏参数



		$admin['cid']= $_REQUEST['cid'];



		$admin['continu'] = $_REQUEST['continu'];



		$admin['status'] = intval($_REQUEST['status']);



		$admin['player'] = trim($_REQUEST['player']);



		$admin['stars'] = intval($_REQUEST['stars']);



		$admin['type'] = !empty($_GET['type'])?$_GET['type']:C('admin_order_type');



		$admin['order'] = !empty($_GET['order'])?$_GET['order']:'desc';



		$admin['orders'] = 'vod_'.$admin["type"].' '.$admin['order'];



		$admin['wd'] = urldecode(trim($_REQUEST['wd']));



		$admin['tag'] = urldecode(trim($_REQUEST['tag']));



		$admin['tid'] = $_REQUEST['tid'];//专题ID



		$admin['p'] = '';



		//生成查询参数



		$limit = C('url_num_admin');



		$order = 'vod_'.$admin["type"].' '.$admin['order'];



		if ($admin['cid']) {



			$where['vod_cid']= getlistsqlin($admin['cid']);



		}



		if($admin["continu"] == 1){



			$where['vod_continu'] = array('neq','0');



		}



		if ($admin['status'] == 2) {



			$where['vod_status'] = array('eq',0);



		}elseif ($admin['status'] == 1) {



			$where['vod_status'] = array('eq',1);



		}elseif ($admin['status'] == 3) {



			$where['vod_status'] = array('eq',-1);



		}



		if($admin['player']){



			$where['vod_play'] = array('like','%'.trim($admin['player']).'%');



		}



		if($admin['stars']){



			$where['vod_stars'] = $admin['stars'];



		}		



		if ($admin['wd']) {



			$search['vod_name'] = array('like','%'.$admin['wd'].'%');



			$search['vod_title'] = array('like','%'.$admin['wd'].'%');



			$search['vod_actor'] = array('like','%'.$admin['wd'].'%');



			$search['vod_director'] = array('like','%'.$admin['wd'].'%');



			$search['_logic'] = 'or';



			$where['_complex'] = $search;



			$admin['wd'] = urlencode($admin['wd']);



		}



		//根据不同条件加载模型



		if($admin['tag']){



			$where['tag_sid'] = 1;



			$where['tag_name'] = $admin['tag'];



			$rs = D('TagView');



			$admin['tag'] = urlencode($_REQUEST['tag']);



		}else{



			$rs = D("Vod");



		}



		//组合分页信息



		$count = $rs->where($where)->count('vod_id');



		$totalpages = ceil($count/$limit);



		$currentpage = !empty($_GET['p'])?intval($_GET['p']):1;



		$currentpage = get_maxpage($currentpage,$totalpages);//$admin['page'] = $currentpage;



		$pageurl = U('Admin-Vod/Show',$admin,false,false).'{!page!}'.C('url_html_suffix');



		$admin['p'] = $currentpage;$_SESSION['vod_jumpurl'] = U('Admin-Vod/Show',$admin).C('url_html_suffix');



		$pages = '共'.$count.'部影片&nbsp;当前:'.$currentpage.'/'.$totalpages.'页&nbsp;'.getpage($currentpage,$totalpages,8,$pageurl,'pagego(\''.$pageurl.'\','.$totalpages.')');



		$admin['pages'] = $pages;



		//查询数据



		$list = $rs->where($where)->order($order)->limit($limit)->page($currentpage)->select();



		foreach($list as $key=>$val){



		    $list[$key]['list_url'] = '?s=Admin-Vod-Show-cid-'.$list[$key]['vod_cid'];



			$list[$key]['vod_url'] = ff_data_url('vod',$list[$key]['vod_id'],$list[$key]['vod_cid'],$list[$key]['vod_name'],1,$list[$key]['vod_jumpurl']);



			$list[$key]['vod_starsarr'] = admin_star_arr($list[$key]['vod_stars']);



		}



		//dump($rs->getLastSql());



		//变量赋值并输出模板



		$this->ppvod_play();



		$this->assign($admin);



		$this->assign('list',$list);



		$this->assign('list_vod',F('_ppvod/listvod'));



		if($admin['tid']){



			$this->display('./Public/system/special_vod.html');



		}else{



	    	$this->display('./Public/system/vod_show.html');



		}



    }



	// 添加编辑影片



    public function add(){



		$rs = D("Vod");



		



		$vod_id = intval($_GET['id']);



		if($vod_id){



            $where['vod_id'] = $vod_id;



			$array = $rs->where($where)->relation('Tag')->find();



			foreach($array['Tag'] as $key=>$value){



				$tag[$key] = $value['tag_name'];



			}



			foreach(explode('$$$',$array['vod_play']) as $key=>$val){



			    $play[array_search($val,C('play_player'))] = $val;



			}



			$array['vod_play_list'] = C('play_player');



			$array['vod_server_list'] = C('play_server');



			$array['vod_play'] = explode('$$$',$array['vod_play']);



			$array['vod_server'] = explode('$$$',$array['vod_server']);	



			$array['vod_url'] = explode('$$$',$array['vod_url']);



			$array['vod_starsarr'] = admin_star_arr($array['vod_stars']);



			$array['vod_tags'] = implode(' ',$tag);



			if (C('admin_time_edit')){



				$array['checktime'] = 'checked';



			}	



			$array['vod_tplname'] = '编辑';



			$_SESSION['vod_jumpurl'] = $_SERVER['HTTP_REFERER'];



		}else{



		    $array['vod_cid'] = cookie('vod_cid');



		    $array['vod_stars'] = 1;



		    $array['vod_status'] = 1;



			$array['vod_hits'] = 0;

            $array['vod_zhanti'] = 0;
			
			 $array['vod_beijin'] = 0;

			$array['vod_addtime'] = time();



			$array['vod_continu'] = 0;



			$array['vod_inputer'] = $_SESSION['admin_name'];



			$array['vod_play_list'] = C('play_player');



			$array['vod_server_list'] = C('play_server');



			$array['vod_url']=array(0=>'');



			$array['vod_starsarr'] = admin_star_arr(1);



			$array['checktime'] = 'checked';



			$array['vod_tplname'] = '添加';



		}



		$array['vod_language_list']=explode(',',C('play_language'));



		$array['vod_zimu_list']=explode(',',C('play_zimu'));



		$array['vod_area_list']=explode(',',C('play_area'));



		$array['vod_year_list']=explode(',',C('play_year'));		



		$this->ppvod_play();



		$this->assign($array);



		$this->assign("jumpUrl",$_SESSION['vod_jumpurl']);



		$this->assign('listvod',F('_ppvod/listvod'));



		$this->display('./Public/system/vod_add.html');



    }



	// 数据库写入前置操作



    public function _before_insert(){



		



		//自动获取关键词tag



		if(empty($_POST["vod_tags"]) && C('rand_tag')){



			



			$_POST["vod_tags"] = ff_tag_auto($_POST["vod_name"],$_POST["vod_content"]);



		}



		//播放器组与地址组



		



		$vod_jishu_arr=explode("{ff}",$_POST["jishu"]);



		$vod_url=array();



		$vod_play_arr=array("bdhd","qvod","tudou","yuku","qiyi","pvod","baofeng","sinahd","sinaz","sohu","souhu","ku6","qq","web9","gvod","swf","flv","pptv","pplive","letv","cntv","wasu","fengxing","ifeng","cool","xunlei","tudou2","xunlei2","media","real","pps","joy","m1905","yinyuetai","v163","ifeng","imgo","down1","down2","down3","down4","down5","down6","down7");



		foreach($vod_play_arr as $v_p_a)



		{



			if(isset($_POST['vod_'.$v_p_a]))



			{



				$v_tmp=explode("{ff}",$_POST['vod_'.$v_p_a]);



				foreach($v_tmp as $vt)



				{



					if(trim($vt)!="")



					{



						$vod_url[$v_p_a][]=$vt;



						$vod_new_url[$v_p_a][]=$vt;



					}



				}



				



			}



		}



		if(isset($_POST['old_url']) && isset($_POST['old_play']))



		{



			foreach($_POST['old_url'] as $kkk=>$old_url)



			{



				$ttt=array_unique(explode("\r\n",$old_url));



				foreach($ttt as $tttttt)



				{



					$vod_url[$_POST['old_play'][$kkk]][]=$tttttt;



					$vod_old_url[$_POST['old_play'][$kkk]][]=$tttttt;



				}



				



			}



			//if($vod_url == $vod_old_url) {



			//	$this->error('集数相同 不需要更新');



			//}



		}







		



	











		$new_vod_url=array();



		$new_vod_play=array();



		foreach($vod_url as $k=>$v)



		{



			//去掉重复的



			$real_v=array_unique($v);



			



			$new_vod_url[]=implode("\r\n",$real_v);



			$new_vod_play[]=$k;



		}







		$_POST["vod_url"] =implode("$$$",$new_vod_url);



	



		$_POST["vod_play"] = implode("$$$",$new_vod_play);



	



		if($_POST['vod_hits']==""){$_POST['vod_hits']=rand(100,600);}



		if($_POST['vod_continu']==""){$_POST['vod_continu']=count($vod_url);}



		



	}



	// 新增数据



	public function insert(){



		$tag = D('Tag');



		$rs = D("Vod");



		$condition['vod_name'] = $_POST['vod_name'];



		$condition['vod_cid'] = $_POST['vod_cid'];



		// 把查询条件传入查询方法



		$ex=$rs->where($condition)->select();



		if($ex){



			$_POST['vod_id']=$ex[0]['vod_id'];



			$_POST['old_url']=explode("$$$",$ex[0]['vod_url']);



			$_POST['old_play']=explode("$$$",$ex[0]['vod_play']);



			$this->update();



			exit;



		} else {



		



			exit;



		}



		if($rs->create()){



			//关联操作>>写入tag



			if($_POST["vod_tags"]){



				$rs->Tag = $tag->tag_array($_POST["vod_tags"],1);



				



				$id = $rs->relation('Tag')->add();



			}else{



				$id = $rs->add();



			}



			$rs->$vod_id = $id;



		}else{



				



		    $this->error($rs->getError());



		}



	}



	// 数据库写入-后置操作



	public function _after_insert(){



		$rs = D("Vod");



		$vod_id = $rs->$vod_id;



		if($vod_id){



			cookie('vod_cid',$vod_id);



			$this->_after_add_update($vod_id);



			$this->assign("jumpUrl",'?s=Admin-Vod-Add');



			$this->success('视频添加成功，继续添加新视频！');



		}else{



			$this->error('视频添加失败。');



		}



	}



	// 更新数据



	public function update(){



	    $this->_before_insert();



		$tag = D('Tag');$rs = D("Vod");







		if($rs->create()){



			



			/*只更新部分字段*/



			$updateFields = array(

				'vod_title' => $_POST['vod_title'],

				'vod_director' => $_POST['vod_director'],

				'vod_actor' => $_POST['vod_actor'],

				'vod_total' => $_POST['vod_total'],

				'vod_continu' => $_POST['vod_continu'],

				'vod_filmtime' => strtotime($_POST['vod_filmtime'].' 0:0:0'),

				'vod_year' => $_POST['vod_year'],

				'vod_url' => $_POST['vod_url'],

				'vod_play' => $_POST['vod_play'],

				'vod_addtime' => time()



			);







			if(false !==  $rs->where(array('vod_id' => $_POST['vod_id']))->save($updateFields)){



				//手动更新TAG



				if($_POST["vod_tags"]){



					$tag->tag_update($_POST["vod_id"],$_POST["vod_tags"],1);



				}



				//后置操作条件



				$rs->$vod_id = $_POST["vod_id"];



				$this->_after_update();



			}else{



				$this->error("修改影片信息失败！");



			}



		}else{



			$this->error($rs->getError());



		}



	}



	// 后置操作



	public function _after_update(){



		$rs = D("Vod");



		$vod_id = $rs->$vod_id;



		if($vod_id){



			$this->_after_add_update($vod_id);



			$this->assign("jumpUrl",$_SESSION['vod_jumpurl']);



			$this->success('视频更新成功！');



		}else{



			$this->error('视频更新失败。');



		}		



	}



	//操作完毕后



	public function _after_add_update($vod_id){



		//删除静态缓存



		if(C('html_cache_on')){



			$id = md5($vod_id).C('html_file_suffix');



			@unlink('./Html/Vod_read/'.$vod_id);



			@unlink('./Html/Vod_play/'.$vod_id);



		}



		//生成网页



		if(C('url_html')){



			echo'<iframe scrolling="no" src="?s=Admin-Create-vodid-id-'.$vod_id.'" frameborder="0" style="display:none"></iframe>';



		}				



	}	



	// 删除影片



    public function del(){



		$this->delfile($_GET['id']);



		redirect($_SESSION['vod_jumpurl']);



    }



	// 删除影片all



    public function delall(){



		if(empty($_POST['ids'])){



			$this->error('请选择需要删除的影片！');



		}	



		$array = $_POST['ids'];



		foreach($array as $val){



			$this->delfile($val);



		}



		redirect($_SESSION['vod_jumpurl']);



    }



	// 删除静态文件与图片



    public function delfile($id){



		$where = array();



		//删除影片观看记录



		//$rs = D("View");



		//$where['did'] = $id;



		//$rs->where($where)->delete();



		//删除专题收录



		$rs = D("Topic");



		$where['topic_sid'] = 1;



		$where['topic_did'] = $id;



		$rs->where($where)->delete();



		unset($where);					



		//删除影片评论



		$rs = D("Cm");



		$where['cm_cid'] = $id;



		$where['cm_sid'] = 1;



		$rs->where($where)->delete();



		unset($where);	



		//删除影片TAG



		$rs = D("Tag");



		$where['tag_id'] = $id;



		$where['tag_sid'] = 1;



		$rs->where($where)->delete();



		unset($where);



		//删除静态文件与图片



		$rs = D("Vod");



		$where['vod_id'] = $id;



		$array = $rs->field('vod_id,vod_cid,vod_pic,vod_name')->where($where)->find();



		@unlink(ff_img_url($arr['vod_pic']));



		if(C('url_html')>0){



			@unlink(ff_data_url('vod',$array['vod_id'],$array['vod_cid'],$array['vod_name'],1));



			@unlink(ff_play_url($array['vod_id'],0,1,$array['vod_cid'],$array['vod_name']));



		}



		unset($where);



		//删除影片ID



		$where['vod_id'] = $id;



		$rs->where($where)->delete();



		unset($where);



    }



	// 批量生成数据



    public function create(){



		echo'<iframe scrolling="no" src="?s=Admin-Create-vodid-id-'.implode(',',$_POST['ids']).'" frameborder="0" style="display:none"></iframe>';



		$this->assign("jumpUrl",$_SESSION['vod_jumpurl']);



		$this->success('批量生成数据成功！');



    }	



	// 批量转移影片



    public function pestcid(){



		if(empty($_POST['ids'])){



			$this->error('请选择需要转移的影片！');



		}	



		$cid = intval($_POST['pestcid']);



		if (getlistson($cid)) {



			$rs = D("Vod");



			$data['vod_cid'] = $cid;



			$where['vod_id'] = array('in',$_POST['ids']);



			$rs->where($where)->save($data);



			redirect($_SESSION['vod_jumpurl']);



		}else{



			$this->error('请选择当前大类下面的子分类！');		



		}







    }	



	// 设置状态



    public function status(){



		$where['vod_id'] = $_GET['id'];



		$rs = D("Vod");



		if($_GET['value']){



			$rs->where($where)->setField('vod_status',1);



		}else{



			$rs->where($where)->setField('vod_status',0);



		}



		redirect($_SESSION['vod_jumpurl']);



    }	



	// Ajax设置星级



    public function ajaxstars(){



		$where['vod_id'] = $_GET['id'];



		$data['vod_stars'] = intval($_GET['stars']);



		$rs = D("Vod");



		$rs->where($where)->save($data);		



		echo('ok');



    }	



	// Ajax设置连载



    public function ajaxcontinu(){



		$where['vod_id'] = $_GET['id'];



		$data['vod_continu'] = trim($_GET['continu']);



		$rs = D("Vod");



		$rs->where($where)->save($data);		



		echo('ok');



    }			



}



?>
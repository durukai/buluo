<?php

class GbAction extends Action{
public function show(){
$_userid = cookie('_userid');
if(!empty($_userid)){
$_userid = cookie_decode($_userid);
$rs = D("User.User");
$member = $rs->getMember(array('userid'=>$_userid));
if($member){
$this->assign("username",$member['username']);
$this->assign("nickname",$member['nickname']);
$this->assign("userid",$member['userid']);
$menus = get_menus(1);
$this->assign("menus",$menus) ;
}
}
$rs = D('Guestbook');
$page = !empty($_GET['p']) ?intval($_GET['p']) : 1;
$limit = intval(C('user_gbnum'));
if (C('user_check')) {
$where['gb_status'] = array('eq',1);
}
$count = $rs->where($where)->count('gb_id');
$totalpages = ceil($count/$limit);
if($page >$totalpages){
$page = $totalpages;
}
$pageurl = UU('User-gb/show',array('p'=>'{!page!}'),false,true);
$pages = '共'.$count.'篇留言&nbsp;当前:'.$page.'/'.$totalpages.'页&nbsp;'.getpage($page,$totalpages,C('home_pagenum'),$pageurl,'pagego(\''.$pageurl.'\','.$totalpages.')');
$list = $rs->where($where)->limit($limit)->order('gb_oid desc,gb_addtime desc')->page($page)->select();
foreach($list as $key=>$val){
$list[$key]['gb_floor'] = $count-(($page-1) * $limit +$key);
}
$vodid = intval($_GET['id']);
if($vodid){
$rs = M("Vod");
$array = $rs->field('vod_id,vod_name,vod_actor')->where('vod_status = 1 and vod_id='.$vodid)->find();
if($array){
$this->assign('gb_content','影片ID'.$array['vod_id'].'点播出现错误！名称：'.$array['vod_name'].' 主演：'.$array['vod_actor']);
}
}
$this->assign('gb_list',$list);
$this->assign('gb_count',$count);
$this->assign('gb_pages',$pages);
$this->assign('vod_id',$vodid);
$this->display('pp_guestbook');
}
public function insert(){
$rs = D("Guestbook");
C('TOKEN_ON',false);
if($rs->create()){
if (false !== $rs->add()) {
$cookie = 'gbook-'.intval($_POST['gb_cid']);
setcookie($cookie,'true',time()+intval(C('user_second')));
if (C('user_check')) {
$this->success('留言成功，我们会尽快审核您的留言！');
}else{
$this->success('恭喜您，留言成功！');
}
}else{
$this->error('留言失败，请重试！');
}
}else{
$this->error($rs->getError());
}
}
}
// 
?>
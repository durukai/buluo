<?php

class MemberAction extends BaseAction {
public function show(){
$this->display('./Public/user/user_center.html');
}
public function saveupdata(){
$memberdetail = $_POST['info'] ;
$rs = M("User");
$userinfo = array();
$userid = $memberdetail['userid'] ;
$password = $memberdetail['password'] ;
$userinfo['nickname'] = $memberdetail['nickname'];
if($password != ''){
$userinfo['encrypt'] = create_randomstr(6);
$userinfo['password'] = password($password,$userinfo['encrypt']);
}
$where = array("userid"=>$userid);
$result = $rs->where($where)->save($userinfo);
if(false !== $result){
$db = M("User_detail");
$count = $db->where($where)->count();
$detail = array();
$detail['userid'] = $userid ;
$detail['sex'] = $memberdetail['sex'] ;
$detail['birthday'] = $memberdetail['birthday'] ;
$detail['prov_id'] = $memberdetail['prov_id'] ;
$detail['city_id'] = $memberdetail['city_id'] ;
$detail['edu'] =  $memberdetail['edu'];
$detail['industry'] = $memberdetail['industry'] ;
$detail['signature'] = $memberdetail['signature'] ;
if($count >0){
$db->save($detail);
}else{
$db->add($detail);
}
$this->success('修改会员成功！');
}else{
$this->error('修改会员失败');
}
}
public function insert(){
$config = $_POST["info"];
$userinfo = array();
$userinfo['encrypt'] = create_randomstr(6);
$userinfo['email'] =  remove_xss($config['email']);
$userinfo['username'] =  remove_xss($config['username']);
$userinfo['password'] =  $config['password'];
$userinfo['nickname'] =  remove_xss($config['nickname']);
$userinfo['regip'] = get_client_ip();
$userinfo['regdate'] = $userinfo['lastdate'] = time();
$userinfo['islock'] = 0;
$password = $userinfo['password'];
$userinfo['password'] = password($userinfo['password'],$userinfo['encrypt']);
$rs = D("User.User");
$userid = $rs->add($userinfo) ;
if($userid >0){
$this->assign("jumpUrl",'?s=User-Member-manage');
$this->success('添加会员成功！');
}else{
$this->error('添加会员失败');
}
}
public function manage(){
$rs = M("User");
$user = array();
$user['q_islock']= $_REQUEST['q_islock'];
$selectType = $_REQUEST['q_selectType'];
$wd = urldecode(trim($_REQUEST['wd']));
$user["selectType"] = $selectType;
$user["wd"] = $wd;
$user['p'] = '';
if($user['q_islock'] == 1){
$where['islock'] = array('eq',1);
}else if($user['q_islock'] == 2){
$where['islock'] = array('eq',0);
}
if(!empty($selectType) &&!empty($wd)){
$where[$selectType] = array('like','%'.$wd.'%');
}
$count = $rs->where($where)->count('userid');
$limit = C('url_num_admin');
$order = 'userid desc ';
$totalpages = ceil($count/$limit);
$currentpage = !empty($_GET['p'])?intval($_GET['p']):1;
$currentpage = get_maxpage($currentpage,$totalpages);
$pageurl = U('User-Member/manage',$user,false,false).'{!page!}'.C('url_html_suffix');
$user['p'] = $currentpage;
$_SESSION['user_jumpurl'] = U('User-Member/manage',$user).C('url_html_suffix');
$pages = '共'.$count.'用户&nbsp;当前:'.$currentpage.'/'.$totalpages.'页&nbsp;'.getpage($currentpage,$totalpages,8,$pageurl,'pagego(\''.$pageurl.'\','.$totalpages.')');
$user['pages'] = $pages;
$list = $rs->where($where)->order($order)->limit($limit)->page($currentpage)->select();
$this->assign($user);
$this->assign('list',$list);
$this->display('./Public/user/member_list.html');
}
public function delete(){
if(empty($_POST['ids'])){
$this->error('请选择需要删除的用户！');
}
$array = $_POST['ids'];
foreach($array as $val){
$this->delUser($val);
}
redirect($_SESSION['user_jumpurl']);
}
public function  delUser($id){
$where = array();
$rs = M("User");
$where['userid'] = $id;
$rs->where($where)->delete();
$db = M("User_detail");
$db->where($where)->delete();
}
public function lock(){
if(empty($_POST['ids'])){
$this->error('请选择需要操作用户！');
}
$array = $_POST['ids'];
$lock = $_GET['status'] ;
$userids = '';
$first = true ;
foreach($array as $val){
if(!$first){
$userids = $userids.',';
}
$userids = $userids.$val ;
$first = false ;
}
$where = array();
$rs = M("User");
$where["userid"] = array('in',$userids) ;
$data['islock'] = $lock;
$rs->where($where)->save($data);
redirect($_SESSION['user_jumpurl']);
}
public function add(){
$this->display('./Public/user/member_add.html');
}
public function edit(){
$where['userid'] = $_GET['id'];
$member = D("User");
$array = $member->where($where)->find();
$detail = D("User_detail");
$arrayDetail = $detail->where($where)->find();
if(!empty($arrayDetail)){
$array = array_merge($array,$arrayDetail);
}
$this->assign($array);
$this->display('./Public/user/member_update.html');
}
public function setting(){
$rs = M('Module');
$array = $rs->where('module="member"')->find();
if($array != null){
$setting = string2array($array["setting"]) ;
$this->assign($setting);
}
$this->display('./Public/user/member_setting.html');
}
public function settingSave(){
$member_setting = array2string($_POST['info']);
$rs = M('Module');
$data['module']= 'member';
$data['setting'] = str_replace('\\','',$member_setting);
$data['updatedate'] = date("Y-m-d");
if(false !==  $rs->save($data)){
F("_user/setting",$_POST['info']);
$this->success('保存成功！');
}else{
$this->error("保存失败！");
}
}
public function Cm(){
$admin = array();$where = array();
$admin['status'] = intval($_GET['status']);
$admin['wd']     = urldecode(trim($_REQUEST['wd']));
if ($admin['status'] == 2) {
$where['ispass'] = array('eq',0);
}elseif ($admin['status'] == 1) {
$where['ispass'] = array('eq',1);
}
if (!empty($admin['wd'])) {
$search['ip']      = array('like','%'.$admin['wd'].'%');
$search['content'] = array('like','%'.$admin['wd'].'%');
$search['username'] = array('like','%'.$admin['wd'].'%');
$search['_logic'] = 'or';
$where['_complex'] = $search;
$admin['wd'] = urlencode($admin['wd']);
}
$admin['p'] = '';
$rs = D('Comment');
$count  = $rs->where($where)->count();
$limit = intval(C('url_num_admin'));
$currentpage = !empty($_GET['p'])?intval($_GET['p']):1;
$totalpages = ceil($count/$limit);
$currentpage = get_maxpage($currentpage,$totalpages);
$pageurl = U('User-Member/Cm',$admin,false,false).'{!page!}';
$admin['p'] = $currentpage;$_SESSION['cm_jumpurl'] = U('User-Member/Cm',$admin);
$admin['pages'] = '共'.$count.'篇评论&nbsp;当前:'.$currentpage.'/'.$totalpages.'页&nbsp;'.getpage($currentpage,$totalpages,8,$pageurl,'pagego(\''.$pageurl.'\','.$totalpages.')');
$admin['list'] = $rs->where($where)->limit($limit)->page($currentpage)->order('creat_at desc')->select();
$this->assign($admin);
$this->display('./Public/user/cm_show.html');
}
public function Cmadd(){
$rs = D('Comment');
$where['comment_id'] = $_GET['id'];
$array = $rs->where($where)->find();
$this->assign($array);
$this->display('./Public/user/cm_add.html');
}
public function Cmupdate(){
$rs = D('Comment');
if ($rs->create()) {
if (false !==  $rs->save()) {
$this->assign("jumpUrl",$_SESSION['cm_jumpurl']);
$this->success('更新评论信息成功！');
}else{
$this->error("更新评论信息失败！");
}
}
$this->error($rs->getError());
}
public function Cmdel(){
$rs = D('Comment');
$where['comment_id'] = $_GET['id'];
$rs->where($where)->delete();
redirect($_SERVER['HTTP_REFERER']);
}
public function Cmdelall($uid){
if(empty($_POST['ids'])){
$this->error('请选择需要删除的评论信息！');
}
$rs = D('Comment');
$where['comment_id'] = array('in',implode(',',$_POST['ids']));
$rs->where($where)->delete();
redirect($_SERVER['HTTP_REFERER']);
}
public function Cmdelclear(){
$rs = D('Comment');
if ($_REQUEST['cid']) {
$rs->where('vod_id > 0')->delete();
}else{
$rs->where('vod_id = 0')->delete();
}
$this->success('所有用户评论或报错信息已经清空！');
}
public function Cmstatus(){
$rs = D('Comment');
$where['comment_id'] = $_GET['id'];
if(intval($_GET['value'])){
$rs->where($where)->setField('ispass',1);
}else{
$rs->where($where)->setField('ispass',0);
}
redirect($_SERVER['HTTP_REFERER']);
}
public function Cmstatusall(){
if(empty($_POST['ids'])){
$this->error('请选择需要操作的评论内容！');
}
$rs = D('Comment');
$where['comment_id'] = array('in',implode(',',$_POST['ids']));
if(intval($_GET['value'])){
$rs->where($where)->setField('ispass',1);
}else{
$rs->where($where)->setField('ispass',0);
}
redirect($_SERVER['HTTP_REFERER']);
}
public function Gb(){
$admin = array();$where = array();
$admin['status'] = intval($_GET['status']);
$admin['intro']     = intval($_GET['intro']);
$admin['wd']     = urldecode(trim($_REQUEST['wd']));
if ($admin['status'] == 2) {
$where['gb_status'] = array('eq',0);
}elseif ($admin['status'] == 1) {
$where['gb_status'] = array('eq',1);
}
if ($admin['intro']) {
$where['gb_intro'] = array('eq','');
}
if (!empty($admin['wd'])) {
$search['gb_ip']      = array('like','%'.$admin['wd'].'%');
$search['gb_content'] = array('like','%'.$admin['wd'].'%');
$search['_logic'] = 'or';
$where['_complex'] = $search;
$admin['wd'] = urlencode($admin['wd']);
}
$admin['p'] = '';
$rs = D('Guestbook');
$count  = $rs->where($where)->count();
$limit = intval(C('url_num_admin'));
$currentpage = !empty($_GET['p'])?intval($_GET['p']):1;
$totalpages = ceil($count/$limit);
$currentpage = get_maxpage($currentpage,$totalpages);
$pageurl = U('User-Member/Gb',$admin,false,false).'{!page!}';
$admin['p'] = $currentpage;$_SESSION['gb_jumpurl'] = U('User-Member/Gb',$admin);
$admin['pages'] = '共'.$count.'篇留言&nbsp;当前:'.$currentpage.'/'.$totalpages.'页&nbsp;'.getpage($currentpage,$totalpages,8,$pageurl,'pagego(\''.$pageurl.'\','.$totalpages.')');
$admin['list'] = $rs->where($where)->limit($limit)->page($currentpage)->order('gb_oid desc,gb_addtime desc')->select();
$this->assign($admin);
$this->display('./Public/user/gb_show.html');
}
function getusername($str)
{
$html = '';
$name = M('User')->where("userid = {$str}")->find();
$html .= " {$name['username']}";
return $html;
}
public function Gbadd(){
$rs = D('Guestbook');
$where['gb_id'] = $_GET['id'];
$array = $rs->where($where)->find();
$this->assign($array);
$this->display('./Public/user/gb_add.html');
}
public function Gbupdate(){
$rs = D('Guestbook');
if ($rs->create()) {
if (false !==  $rs->save()) {
$this->assign("jumpUrl",$_SESSION['gb_jumpurl']);
$this->success('更新留言信息成功！');
}else{
$this->error("更新留言信息失败！");
}
}
$this->error($rs->getError());
}
public function Gbdel(){
$rs = D('Guestbook');
$where['gb_id'] = $_GET['id'];
$rs->where($where)->delete();
redirect($_SERVER['HTTP_REFERER']);
}
public function Gbdelall($uid){
if(empty($_POST['ids'])){
$this->error('请选择需要删除的留言信息！');
}
$rs = D('Guestbook');
$where['gb_id'] = array('in',implode(',',$_POST['ids']));
$rs->where($where)->delete();
redirect($_SERVER['HTTP_REFERER']);
}
public function Gbdelclear(){
$rs = D('Guestbook');
if ($_REQUEST['cid']) {
$rs->where('gb_cid > 0')->delete();
}else{
$rs->where('gb_cid = 0')->delete();
}
$this->success('所有用户留言或报错信息已经清空！');
}
public function Gbstatus(){
$rs = D('Guestbook');
$where['gb_id'] = $_GET['id'];
if(intval($_GET['value'])){
$rs->where($where)->setField('gb_status',1);
}else{
$rs->where($where)->setField('gb_status',0);
}
redirect($_SERVER['HTTP_REFERER']);
}
public function Gborder(){
$rs = D('Guestbook');
$where['gb_id'] = $_GET['id'];
if(intval($_GET['value'])){
$rs->where($where)->setField('gb_oid',1);
}else{
$rs->where($where)->setField('gb_oid',0);
}
redirect($_SERVER['HTTP_REFERER']);
}
public function Gbstatusall(){
if(empty($_POST['ids'])){
$this->error('请选择需要操作的留言内容！');
}
$rs = D('Guestbook');
$where['gb_id'] = array('in',implode(',',$_POST['ids']));
if(intval($_GET['value'])){
$rs->where($where)->setField('gb_status',1);
}else{
$rs->where($where)->setField('gb_status',0);
}
redirect($_SERVER['HTTP_REFERER']);
}
public function mailsetting(){
$rs = M('Module');
$array = $rs->where('module="admin"')->find();
if($array != null){
$setting = string2array($array["setting"]) ;
$this->assign($setting);
}
$this->display('./Public/user/member_mailsetting.html');
}
public function mailSettingSave(){
$config = $_POST["config"];
$setting = array();
$setting['mail_server'] = trim($config['mail_server']);
$setting['mail_port'] = trim($config['mail_port']);
$setting['mail_user'] = trim($config['mail_user']);
$setting['mail_password'] = trim($config['mail_password']);
$setting['mail_from'] = trim($config['mail_from']);
$arraysetting = array2string($setting);
$rs = M('Module');
$data['module']= 'admin';
$data['setting'] = str_replace('\\','',$arraysetting);
$data['updatedate'] = date("Y-m-d");
if(false !==  $rs->save($data)){
F("_user/mailsetting",$setting);
$this->success('保存成功！');
}else{
$this->error("保存失败！");
}
}
public function testMail(){
$setting = array(
"MAIL_ADDRESS"=>$_POST["mail_from"],
"MAIL_SMTP"=>$_POST["mail_server"],
"MAIL_LOGINNAME"=>$_POST["mail_user"],
"MAIL_PASSWORD"=>$_POST["mail_password"],
"MAIL_PORT"=>$_POST["mail_port"]
);
$address = $_POST["mail_to"] ;
$title = 'test mail';
$message = 'this is a test mail';
$result =  SendMail($address,$title,$message,$setting,$_POST["mail_user"]) ;
if($result){
echo '邮件测试成功!';
}else{
echo '邮件测试失败!';
}
}
public function connect(){
$rs = M('Module');
$array = $rs->where('module="connect"')->find();
if($array != null){
$setconfig = string2array($array["setting"]) ;
$this->assign($setconfig);
}
$this->display('./Public/user/member_loginconfig.html');
}
public function connect_save(){
$config = $_POST["setconfig"];
$setting = array();
$setting['sina_akey'] = trim($config['sina_akey']);
$setting['sina_skey'] = trim($config['sina_skey']);
$setting['qq_akey'] = trim($config['qq_akey']);
$setting['qq_skey'] = trim($config['qq_skey']);
$setting['qq_appid'] = trim($config['qq_appid']);
$setting['qq_appkey'] = trim($config['qq_appkey']);
$setting['qq_callback'] = trim($config['qq_callback']);
$arraysetting = array2string($setting);
$rs = M('Module');
$data['module']= 'connect';
$data['setting'] = str_replace('\\','',$arraysetting);
$data['updatedate'] = date("Y-m-d");
if(false !==  $rs->save($data)){
F("_user/connectsetting",$setting);
$this->success('保存成功！');
}else{
$this->error("保存失败！");
}
}
}
// 
?>
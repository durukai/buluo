<?php

class CenterAction extends UserAction {
public function _initialize(){
parent::_initialize();
$this->http_user_agent = $_SERVER['HTTP_USER_AGENT'];
}
public function reg(){
$member_setting = F("_user/setting");
$auth_key = $this->getSystemAuthKey();
header("Cache-control: private");
if($_POST['t'] == "2"||$_GET['t'] == "2"){
$authUser = $member_setting['register_email_auth']=='1';
if($authUser){
$this->assign("t","2");
$this->assign(array("email"=>cookie_decode(cookie("email")),"username"=>cookie_decode(cookie("_username")))) ;
$this->display('./Public/user/reg.html');
}else{
redirect("".getAppPatht()."User-Center-login") ;
}
}else if(isset($_POST['dosubmit'])) {
$userinfo = array();
$userinfo['encrypt'] = create_randomstr(6);
$userinfo['email'] =  remove_xss($_POST['email']);
$userinfo['iemail'] =  isset($_POST['email']) ?$_POST['email'] :  remove_xss($_POST['iemail']);
$userinfo['username'] =  remove_xss($_POST['username']);
$userinfo['password'] =  $_POST['password'];
$userinfo['nickname'] =  isset($_POST['nickname']) ?$_POST['nickname'] :  remove_xss($_POST['username']);
$userinfo['regip'] = get_client_ip();
$userinfo['regdate'] = $userinfo['lastdate'] = time();
$password = $userinfo['password'];
$userinfo['password'] = password($userinfo['password'],$userinfo['encrypt']);
$authUser = $member_setting['register_email_auth']=='1';
if($authUser){
$userinfo['groupid'] = 7 ;
}else{
$userinfo['groupid'] = 2 ;
}
$rs = D("User.User");
$userid = $rs->add($userinfo) ;
if($userid >0){
if($userinfo['groupid'] == 7){
$cms_auth_key = md5($auth_key);
$code = sys_auth($userid.'|'.$cms_auth_key,'ENCODE',$cms_auth_key);
$url = getAppPath()."User-Center-reg&code=$code&verify=1";
$message = $member_setting['register_verify_message'];
$message = str_replace(array('{click}','{url}','{username}','{email}','{password}'),
array('<a href="'.$url.'">请点击</a>',$url,$userinfo['username'],$userinfo['email'],$password),$message);
setcookie("_username",cookie_encode($userinfo['username']),0);
setcookie("email",cookie_encode($userinfo['email']),0);
quickSendMail($userinfo['email'],"注册会员验证邮件",$message);
}else{
$cms_auth_key = md5($auth_key.$this->http_user_agent);
$cms_auth = sys_auth($userid."\t".$userinfo['password'],'ENCODE',$cms_auth_key);
setcookie('auth',$cms_auth,0);
setcookie('_userid',$userid,0);
setcookie('_username',$userinfo['username'],0);
}
$result = array("msg"=>"操作成功！","rcode"=>1,"t"=>"2");
}else{
$result = array("msg"=>"注册失败！","rcode"=>0);
}
exit(json_encode($result));
}else{
if(!empty($_GET['verify'])) {
$cms_auth_key = md5($auth_key);
$code = isset($_GET['code']) ?trim($_GET['code']) : "";
$code_res = sys_auth($code,'DECODE',$cms_auth_key);
$code_arr = explode('|',$code_res);
$userid = isset($code_arr[0]) ?$code_arr[0] : '';
$rs = D("User.User");
if(is_numeric($userid)){
$rs->updatetmemberlogin(array('groupid'=>2),$userid);
$this->showmessage("验证成功，请重新登录！","".getAppPatht()."User-Center-login");
}else{
$this->showmessage("验证失败！","".getAppPatht()."User-Center-login");
}
}else{
if($_GET['t'] == "2"){
$authUser = $member_setting['register_email_auth']=='1';
if($authUser){
$this->assign("t","2");
}
}
$connectsetting = F("_user/connectsetting");
$this->assign($connectsetting) ;
$this->display('./Public/user/reg.html');
}
}
}
public function send_newmail(){
$newemail = $_GET['newemail'];
$username = cookie_decode(cookie("_username")) ;
$userid = cookie_decode(cookie("_userid")) ;
if($newemail == ''||$username == ''||$userid == ''){
$result = array("msg"=>"发送失败 ","rcode"=>"-1");
exit(json_encode($result));
}
$auth_key = $this->getSystemAuthKey();
$cms_auth_key = md5($auth_key);
$code = sys_auth($userid.'|'.$cms_auth_key,'ENCODE',$cms_auth_key);
$url = getAppPath()."User-Center-reg&code=$code&verify=1";
$member_setting = F("_user/setting");
$message = $member_setting['register_verify_message'];
$message = str_replace(array('{click}','{url}','{username}','{email}'),
array('<a href="'.$url.'">请点击</a>',$url,$username,$newemail),$message);
$flag = quickSendMail($newemail,"注册会员验证邮件",$message) ;
if($flag == true){
$result = array("msg"=>"发送成功","rcode"=>"1");
exit(json_encode($result));
}else{
$result = array("msg"=>"发送失败  ".$flag,"rcode"=>"-1");
exit(json_encode($result));
}
}
public function usernav(){
$_userid = cookie('_userid');
if(!empty($_userid)){
$_userid = cookie_decode($_userid);
$rs = D("User.User");
$member = $rs->getMember(array('userid'=>$_userid));
if($member){
if($member['groupid'] != 7){
$avatar = ps_getavatar($_userid);
$image = $avatar['48'] ;
if(empty($image)){
$image = getAppPath().'/style/images/noavatar_small.gif';
}
$this->assign("avatar",$image);
$this->assign("username",$member['username']);
$menus = get_menus(1);
$this->assign("menus",$menus) ;
}
}
}
$forward= isset($_GET['forward']) ?urlencode($_GET['forward']) : urlencode(get_url());
$this->assign("forward",$forward);
$this->display("./Public/user/user_nav.html");
}
public function modlogin(){
$username =  trim($_POST['username']);
$email =  trim($_POST['email']);
$password =  trim($_POST['password']);
$verifypass =  trim($_POST['verifypass']);
$rs = D("User.User");
$count = $rs->where(array('email'=>$email))->count();
$result = array();
if($count >0){
$result = array("msg"=>"邮箱已被使用！","rcode"=>-1);
}else if($password != $verifypass){
$result = array("msg"=>"密码前后不一置！","rcode"=>-1);
}else{
$userinfo = array();
$userinfo['username'] = $username ;
$userinfo['email'] = $email ;
$userinfo['password'] =  md5(md5(trim($password)).$this->memberinfo['encrypt']) ;
$userinfo['groupid'] =  2 ;
$rs->updatetmemberlogin($userinfo,$this->memberinfo['userid']);
$auth_key = $this->getSystemAuthKey();
$cms_auth_key = md5($auth_key.$this->http_user_agent);
$cms_auth = sys_auth($this->memberinfo['userid']."\t".$userinfo['password'],'ENCODE',$cms_auth_key);
setcookie('auth',$cms_auth);
$result = array("msg"=>"操作成功！","rcode"=>1,"redir"=>"".getAppPatht()."User-Center","wantredir"=>1);
}
exit(json_encode($result));
}
public function regbind(){
$_formname = cookie_decode(cookie('_formname'));
$this->assign("nickname",$_formname);
$this->display("./Public/user/qqreg.html") ;
}
public function qqlogin(){
$connectsetting = F("_user/connectsetting");
$appid = $connectsetting['qq_appid'];
$appkey = $connectsetting['qq_appkey'];
$callback = $connectsetting['qq_callback'];
import("qqapi",APP_PATH .'/Common/User');
$info = new qqapi($appid,$appkey,$callback);
if(!isset($_GET['code'])){
$info->redirect_to_login();
}else{
$code = $_GET['code'];
$openid = $_SESSION['openid'] = $info->get_openid($code);
$rs = D("User.User");
if(!empty($openid)){
$_SESSION['connectid'] = $openid;
$_SESSION['from'] = 'qq';
$list = $rs->getMember(array('connectid'=>$openid,'from'=>'qq'));
if(!empty($list)){
$userid = $list['userid'];
$groupid = $list['groupid'];
$username = $list['username'];
$nickname = empty($list['nickname']) ?$username : $list['nickname'];
$password = $list['password'];
$updatearr = array('lastip'=>get_client_ip(),'lastdate'=>time());
$rs->updatetmemberlogin($updatearr,$userid);
$auth_key = $this->getSystemAuthKey();
$cms_auth_key = md5($auth_key.$this->http_user_agent);
$cms_auth = sys_auth($userid."\t".$password,'ENCODE',$cms_auth_key);
setcookie('auth',$cms_auth);
setcookie('_userid',cookie_encode($userid));
setcookie('_username',cookie_encode($username));
setcookie('_groupid',cookie_encode($groupid));
setcookie('_nickname',cookie_encode($nickname));
if($groupid == 5){
$user = $info->get_user_info();
setcookie('_formname',cookie_encode($user));
redirect("".getAppPatht()."User-Center-regbind") ;
}else{
$forward = isset($_GET['forward']) &&!empty($_GET['forward']) ?$_GET['forward'] : ''.getAppPatht().'User-Center';
redirect($forward) ;
}
}else{
$connect_username = $info->get_user_info();
$username = create_randomstr(12) ;
$password = create_randomstr(6) ;
$userinfo = array();
$userinfo['username'] = remove_xss($username) ;
$userinfo['nickname'] = remove_xss($connect_username) ;
$userinfo['regip'] = get_client_ip();
$userinfo['groupid'] = 5;
$userinfo['regdate'] = $userinfo['lastdate'] = time();
$userinfo['connectid'] = $_SESSION['connectid'] ;
$userinfo['from'] = $_SESSION['from'] ;
$userinfo['encrypt'] = create_randomstr(6);
$userinfo['password'] = password($password,$userinfo['encrypt']);
$rs = D("User.User");
$userid = $rs->add($userinfo) ;
if($userid >0){
$auth_key = $this->getSystemAuthKey();
$cms_auth_key = md5($auth_key.$this->http_user_agent);
$cms_auth = sys_auth($userid."\t".$userinfo['password'],'ENCODE',$cms_auth_key);
setcookie('auth',$cms_auth);
setcookie('_userid',cookie_encode($userid));
setcookie('_username',cookie_encode($username));
setcookie('_groupid',cookie_encode(5));
setcookie('_nickname',cookie_encode($connect_username));
setcookie('_formname',cookie_encode($connect_username));
redirect("".getAppPatht()."User-Center-regbind") ;
}else{
$this->showmessage("验证失败！","".getAppPatht()."User-Center-login");
}
}
}else{
redirect("".getAppPatht()."User-Center-login") ;
}
}
}
public function login(){
if(isset($_POST['dosubmit'])) {
$username = trim($_POST['username']);
$password = trim($_POST['password']);
$cookietime = trim($_POST['cookietime']);
$rs = D("User.User");
$where['username'] = array('eq',$username);
$where['email']    = array('eq',$username);
$where['_logic']   = 'or';
$list = $rs->getMember($where);
if(!$list){
$result = array("msg"=>"登录失败,请检查用户名或者邮箱","rcode"=>"-1");
exit(json_encode($result));
}
$password = md5(md5(trim($password)).$list['encrypt']);
if($list['password'] != $password) {
$result = array("msg"=>"登录失败,请检查用户密码","rcode"=>"-1");
exit(json_encode($result));
}
if($list['islock'] == 1) {
$result = array("msg"=>"登录失败,用户已锁定","rcode"=>"-1");
exit(json_encode($result));
}
if($list['groupid'] == 7){
setcookie('auth','');
setcookie('_userid','');
setcookie('_username','');
setcookie('_groupid','');
setcookie('_nickname','');
setcookie('_userid',cookie_encode($list['userid']));
setcookie('_username',cookie_encode($list['username']));
setcookie('email',cookie_encode($list['email']));
$result = array("msg"=>"需要邮箱认证","rcode"=>"-1","redir"=>"".getAppPatht()."User-Center-reg&t=2","wantredir"=>1);
exit(json_encode($result));
}
$userid = $list['userid'];
$groupid = $list['groupid'];
$username = $list['username'];
$nickname = empty($list['nickname']) ?$username : $list['nickname'];
$updatearr = array('lastip'=>get_client_ip(),'lastdate'=>time());
$rs->updatetmemberlogin($updatearr,$userid);
if(!isset($cookietime)) {
$get_cookietime = intval($_COOKIE['cookietime']);
}
$_cookietime = $cookietime ?intval($cookietime) : ($get_cookietime ?$get_cookietime : 0);
$cookietime = $_cookietime ?time() +$_cookietime : 0;
$auth_key = $this->getSystemAuthKey();
$cms_auth_key = md5($auth_key.$this->http_user_agent);
$cms_auth = sys_auth($userid."\t".$password,'ENCODE',$cms_auth_key);
setcookie('auth',$cms_auth,$cookietime);
setcookie('_userid',cookie_encode($userid),$cookietime);
setcookie('_username',cookie_encode($username),$cookietime);
setcookie('_groupid',cookie_encode($groupid),$cookietime);
setcookie('_nickname',cookie_encode($nickname),$cookietime);
if(!isset($_POST['notforward'])){
$forward = isset($_POST['forward']) &&!empty($_POST['forward']) ?urldecode($_POST['forward']) : ''.getAppPatht().'User-Center';
$result = array("msg"=>"登录成功","rcode"=>"1","redir"=>$forward,"wantredir"=>1);
}else{
$result = array("msg"=>"登录成功","rcode"=>"1");
}
exit(json_encode($result));
}else{
$connectsetting = F("_user/connectsetting");
$this->assign($connectsetting) ;
$forward = isset($_GET['forward']) &&trim($_GET['forward']) ?urlencode($_GET['forward']) : '';
$this->assign("forward",$forward) ;
$this->display('./Public/user/login.html');
}
}
public function logout() {
setcookie('auth','');
setcookie('_userid','');
setcookie('_username','');
setcookie('_groupid','');
setcookie('_nickname','');
setcookie('cookietime','');
$forward = isset($_GET['forward']) &&trim($_GET['forward']) ?$_GET['forward'] : '/';
redirect("".getAppPath()."") ;
}
public function validation(){
if(isset($_POST['d'])){
}
$username = $_POST["username"] ;
$email = $_POST["email"] ;
}
public function forgetpwd(){
if(isset($_POST['dosubmit'])) {
if ($_SESSION['code'] != strtolower($_POST['validate'])) {
$result = array("msg"=>"验证码不正确","rcode"=>"-1");
exit(json_encode($result));
}
$rs = D("User.User");
$where['email']    = array('eq',$_POST['email']);
$memberinfo = $rs->getmember($where);
if(!empty($memberinfo['email'])) {
$email = $memberinfo['email'];
}else {
$result = array("msg"=>"邮箱不存在","rcode"=>"-1");
exit(json_encode($result));
}
$auth_key = $this->getSystemAuthKey();
$cms_auth_key = md5($auth_key.$this->http_user_agent);
$code = sys_auth($memberinfo['userid']."\t".time(),'ENCODE',$cms_auth_key);
$member_setting = F("_user/setting");
$message = $member_setting['forgetpasswordmessage'] ;
$url = getAppPatht()."User-Center-forgetpwd&code=$code";
$message = str_replace(array('{click}','{url}'),array('<a href="'.$url.'">点击</a>',$url),$message);
quickSendMail($email,"密码找回邮件内容",$message);
$result = array("msg"=>"系统已经将链接发至您的邮箱，请登录您邮箱进行密码重置",
"rcode"=>"1","redir"=>"".getAppPatht()."User-Center-login","wantredir"=>1);
exit(json_encode($result));
}elseif($_GET['code']){
$auth_key = $this->getSystemAuthKey();
$cms_auth_key = md5($auth_key.$this->http_user_agent);
$hour = date('y-m-d h',time());
$code = sys_auth($_GET['code'],'DECODE',$cms_auth_key);
$code = explode("\t",$code);
if(is_array($code) &&is_numeric($code[0]) &&date('y-m-d h',time()) == date('y-m-d h',$code[1])) {
$rs = D("User.User");
$memberinfo = $rs->getmember(array('userid'=>$code[0]));
$updateinfo = array();
$password = random(8);
$updateinfo['password'] = password($password,$memberinfo['encrypt']);
$rs->updatetmemberlogin($updateinfo,$code[0]);
$this->showmessage("操作成功！新密码为:".$password,"close");
}else{
$this->showmessage("超时操作失败！","".getAppPatht()."User-Center-login");
}
}else{
$this->display('./Public/user/forgetpwd.html');
}
}
public function show(){
$this->display('./Public/user/message.html');
}
public function validemail(){
$email = $_GET['email'];
if(empty($email)){
$this->ajaxReturn("",0,0);
}
$where = array();
$where["email"] = $email ;
$rs = D("User.User");
if($rs->checkunique($where)){
$this->ajaxReturn("此Email可用",1,1);
}else{
$this->ajaxReturn("",0,0);
}
}
public function validecode(){
$imgcode = $_GET['imgcode'];
$sessionCode = $_SESSION['code'] ;
$status = 0 ;
if($imgcode == $sessionCode){
$status = 1 ;
}
$this->ajaxReturn("","",$status);
}
public function valideusername(){
$username = $_GET['username'];
if(empty($username)){
$this->ajaxReturn("",0,0);
}
$where = array();
$where["username"] = $username ;
$rs = D("User.User");
if($rs->checkunique($where)){
$this->ajaxReturn("该用户名可以注册",1,1);
}else{
$this->ajaxReturn("",0,0);
}
}
public function agreement(){
$this->display('./Public/user/agreement.html');
}
public function index(){
$this->assign("avatarlist",ps_getavatar($this->memberinfo['userid']));
$menus = get_menus();
$this->assign("menus",$menus) ;
$memberinfo = $this->memberinfo;
$this->assign("action","");
$this->assign("memberinfo",$memberinfo);
$this->display('./Public/user/user_center.html');
}
public function info(){
if(isset($_POST['dosubmit'])) {
$memberdetail = $_POST['info'] ;
$rs = D("User.User");
$rs->updatetmemberlogin(array('nickname'=>remove_xss($memberdetail['nickname'])),$this->memberinfo['userid']);
$rs->updatetmemberdetailinfo($memberdetail,$this->memberinfo['userid']);
$this->showmessage("修改成功！",$_SERVER['HTTP_REFERER']);
}else{
$menus = get_menus();
$this->assign("menus",$menus) ;
$this->assign("action","info");
$memberinfo = $this->memberinfo;
$this->assign("memberinfo",$memberinfo);
$this->display('./Public/user/user_info.html');
}
}
public function uploadavatar(){
}
public function avatar(){
$this->assign("avatarlist",ps_getavatar($this->memberinfo['userid']));
$menus = get_menus();
$this->assign("menus",$menus) ;
$memberinfo = $this->memberinfo;
$this->assign("memberinfo",$memberinfo);
$this->assign("menus",$menus) ;
$this->assign("avatarlist",ps_getavatar($this->memberinfo['userid']));
$this->assign("action","info");
$this->display('./Public/user/user_avatar.html');
}
public function pwd(){
if(isset($_POST['dosubmit'])) {
$updateinfo = array();
$password = $_POST['info']['password'] ;
$password =  md5(md5(trim($password)).$this->memberinfo['encrypt']) ;
if($this->memberinfo['password'] != $password){
$this->showmessage("原密码错误！",$_SERVER['HTTP_REFERER']);
}
$newpass = $_POST['info']['newpass'];
$verifypass = $_POST['info']['verifypass'];
if($newpass != $verifypass){
$this->showmessage("新密码与确认密码不相同！",$_SERVER['HTTP_REFERER']);
}
$newpassword = md5(md5(trim($newpass)).$this->memberinfo['encrypt']) ;
$updateinfo['password'] = $newpassword;
$rs = D("User.User");
$rs->updatetmemberlogin($updateinfo,$this->memberinfo['userid']);
$auth_key = $this->getSystemAuthKey();
$cms_auth_key = md5($auth_key.$this->http_user_agent);
$cms_auth = sys_auth($this->memberinfo['userid']."\t".$newpassword,'ENCODE',$cms_auth_key);
setcookie('auth',$cms_auth);
$this->showmessage("密码修改成功！",$_SERVER['HTTP_REFERER']);
}else{
$menus = get_menus();
$this->assign("menus",$menus) ;
$this->assign("action","info");
$memberinfo = $this->memberinfo;
$this->assign("memberinfo",$memberinfo);
$this->display('./Public/user/user_pwd.html');
}
}
public function msg(){
$this->display('./Public/user/msg.html');
}
public function love(){
$rs = D("User.User");
if($_GET["op"] == "1"){
$list = $rs->getFavoritList($this->memberinfo['userid'],$_GET["pid"]) ;
$result = $this->outputFavoritDatas($list);
exit(json_encode($result));
}else if($_GET["op"] ==2){
}else{
$catalogs =$rs->getCatalogs($this->memberinfo['userid']) ;
$menus = get_menus();
$this->assign("menus",$menus) ;
$this->assign("action","love");
$this->assign("catalogs",$catalogs) ;
$memberinfo = $this->memberinfo;
$this->assign("memberinfo",$memberinfo);
$this->display('./Public/user/user_love.html');
}
}
public function remind(){
$rs = D("User.User");
if($_GET["op"] == "1"){
$list = $rs->getRemindList($this->memberinfo['userid'],$_GET["pid"]) ;
$result = $this->outputRemindDatas($list);
exit(json_encode($result));
}else if($_GET["op"] ==2){
}else{
$catalogs =$rs->getRemindCatalogs($this->memberinfo['userid']) ;
$menus = get_menus();
$this->assign("menus",$menus) ;
$this->assign("action","remind");
$this->assign("catalogs",$catalogs) ;
$memberinfo = $this->memberinfo;
$this->assign("memberinfo",$memberinfo);
$this->display('./Public/user/user_remind.html');
}
}
private function outputFavoritDatas($list){
$result = array() ;
$ajaxtxt = "";
foreach ($list as $key =>$value){
if(is_array($value)){
$link = ff_data_url('vod',$value['vod_id'],$value['vod_cid'],$value['vod_name'],1,$value['vod_jumpurl']);
$ajaxtxt.="<li>";
$ajaxtxt.="<a target='_blank' class='play-img' href='".$link."'>";
$ajaxtxt.="<img src='".ff_img_url($value['vod_pic'],$value['vod_content'])."' alt='".$value['vod_name']."'/>";
$ajaxtxt.="<label class='mask'>&nbsp;</label>";
if($value['vod_continu'] != 0){
$ajaxtxt.="<label class='text'>第".$value['vod_continu']."集</label>";
}else{
if(empty($value['vod_title'])){
$ajaxtxt.="<label class='text'>完整高清</label>";
}else{
$ajaxtxt.="<label class='text'>".$value['vod_title']."</label>";
}
}
$ajaxtxt.="</a>";
$ajaxtxt.="<h5><a target='_blank' href='".$link."' title='".$value['vod_name']."'>".$value['vod_name']."</a></h5>";
$ajaxtxt.="<div class='user-todo user-todo-check fn-clear'>";
$ajaxtxt.="<label class='label-checkbox' for='checkbox".$value['vod_id']."' hidefocus>";
$ajaxtxt.="<input type='checkbox' name='loveids' value='".$value['vod_id']."' id='checkbox".$value['vod_id']."' />";
$ajaxtxt.="</label>";
$ajaxtxt.="<a class='ui-del fav-cancel' href='javascript:void(0);' data='".getAppPatht()."User-Center-dellove-lid-".$value['vod_id']."-pid-".$value['pid']."'>删除</a>";
$ajaxtxt.="</div>";
$ajaxtxt.="</li>";
}
}
$result["pages"]="";
$result["ajaxtxt"]=$ajaxtxt;
return $result;
}
private function outputRemindDatas($list){
$result = array() ;
$ajaxtxt = "";
foreach ($list as $key =>$value){
if(is_array($value)){
$link = ff_data_url('vod',$value['vod_id'],$value['vod_cid'],$value['vod_name'],1,$value['vod_jumpurl']);
$ajaxtxt.="<li>";
$ajaxtxt.="<div class=\"i-rss-list\">";
$ajaxtxt.="<a target='_blank' class='play-pic play-img boxpic' href='".$link."' data=\"".$value['vod_id']."\">";
$ajaxtxt.="<img src='".ff_img_url($value['vod_pic'],$value['vod_content'])."' alt='".$value['vod_name']."'/>";
$ajaxtxt.="<div style=\"DISPLAY: none\" class=\"i-rss-box fn-clear\">";
$ajaxtxt.="<p class=\"play-list fn-clear\" id=\"".$value['vod_id']."\" data=\"\" data=\"1\">";
$ajaxtxt.="<img src=\"/Public/user/images/loading.gif\" complete=\"complete\"/>";
$ajaxtxt.="</div>";
$ajaxtxt.="<label class='mask'>&nbsp;</label>";
if($value['vod_continu'] != 0){
$ajaxtxt.="<label class='text'>第".$value['vod_continu']."集</label>";
}else{
if(empty($value['vod_title'])){
$ajaxtxt.="<label class='text'>完整高清</label>";
}else{
$ajaxtxt.="<label class='text'>".$value['vod_title']."</label>";
}
}
$ajaxtxt.="</a>";
$ajaxtxt.="<h5><a target='_blank' href='".$link."' title='".$value['vod_name']."'>".$value['vod_name']."</a></h5>";
$ajaxtxt.="<div class='user-todo user-todo-check fn-clear'>";
$ajaxtxt.="<label class='label-checkbox' for='checkbox".$value['vod_id']."' hidefocus>";
$ajaxtxt.="<input type='checkbox' name='remindids' value='".$value['vod_id']."' id='checkbox".$value['vod_id']."' />";
$ajaxtxt.="</label>";
$ajaxtxt.="<a class='ui-del fav-cancel' href='javascript:void(0);' data='".getAppPatht()."User-Center-delremind-lid-".$value['vod_id']."-pid-".$value['pid']."'>删除</a>";
$ajaxtxt.="</div>";
$ajaxtxt.="</div>";
$ajaxtxt.="</li>";
}
}
$result["pages"]="";
$result["ajaxtxt"]=$ajaxtxt;
return $result;
}
public function savelove(){
$result = array();
$id = $_GET["id"] ;
if(isset($id)){
$rs = D("Vod");
$cid = $rs->where(array('vod_id'=>$id))->getField('vod_cid') ;
$rootid = getParentCatalog($cid);
$fav = D("Favorite");
$data['vod_id'] = $id ;
$data['user_id'] = $this->memberinfo['userid'];
$data['vod_cid'] = $rootid;
$data['cdate'] = time();
$id = $fav->add($data) ;
if($id >0){
$list = D("User.User");
$dhtxt = "<li class='current'><a href='".getAppPatht()."User-Center-love-op-1'>全部</a></li>";
$catalogs =$list->getCatalogs($this->memberinfo['userid']) ;
foreach ($catalogs as $key =>$value){
$dhtxt.= "<li class='line'></li><li><a href='".getAppPatht()."User-Center-love-op-1-pid-".$value['id']."' hidefocus=''>".$value['name']."<span>".$value['count']."</span></a></li>";
}
$result = array("msg"=>"成功添加收藏","rcode"=>1,"dhtxt"=>$dhtxt);
}else{
$result = array("msg"=>"添加收藏失败".$id,"rcode"=>-1);
}
}else{
$result = array("msg"=>"添加收藏失败","rcode"=>-1);
}
exit(json_encode($result));
}
public function dellove(){
$pid = $_GET["pid"] ;
$lid = $_GET["lid"] ;
$result = array();
if(isset($pid) &&isset($lid)){
$rs = D("Favorite");
$where = array('vod_id'=>$lid,'vod_cid'=>$pid,'user_id'=>$this->memberinfo['userid']);
$rs->where($where)->delete();
$list = D("User.User");
$dhtxt = "<li class='current'><a href='".getAppPatht()."User-Center-love-op-1'>全部</a></li>";
$catalogs =$list->getCatalogs($this->memberinfo['userid']) ;
foreach ($catalogs as $key =>$value){
$dhtxt.= "<li class='line'></li><li><a href='".getAppPatht()."User-Center-love-op-1-pid-".$value['id']."' hidefocus=''>".$value['name']."<span>".$value['count']."</span></a></li>";
}
$result = array("msg"=>"删除成功","rcode"=>"1","dhtxt"=>$dhtxt);
}else if(isset($_POST["delids"])){
$delids = $_POST["delids"] ;
$rs = D("Favorite");
$where['user_id'] = array('eq',$this->memberinfo['userid']);
$where['vod_id'] = array('in',$delids);
$rs->where($where)->delete();
$list = D("User.User");
$dhtxt = "<li class='current'><a href='".getAppPatht()."User-Center-love-op-1'>全部</a></li>";
$catalogs =$list->getCatalogs($this->memberinfo['userid']) ;
foreach ($catalogs as $key =>$value){
$dhtxt.= "<li class='line'></li><li><a href='".getAppPatht()."User-Center-love-op-1-pid-".$value['id']."' hidefocus=''>".$value['name']."<span>".$value['count']."</span></a></li>";
}
$result = array("msg"=>"删除成功","rcode"=>"1","dhtxt"=>$dhtxt);
}else{
$result = array("msg"=>"删除失败","rcode"=>"-1");
}
exit(json_encode($result));
}
public function getlove(){
$list = D("User.User");
$datas =$list->getLoveDatas($this->memberinfo['userid']) ;
$result = array() ;
$ajaxtxt = "";
foreach ($datas as $key =>$value){
$link = ff_data_url('vod',$value['vod_id'],$value['vod_cid'],$value['vod_name'],1,$value['vod_jumpurl']);
$ajaxtxt.="<li>";
$ajaxtxt.="<a target='_blank' class='play-img' href='".$link."'>";
$ajaxtxt.="<img src='".ff_img_url($value['vod_pic'],$value['vod_content'])."' alt='".$value['vod_name']."'/>";
$ajaxtxt.="</a>";
$ajaxtxt.="<h5><a target='_blank 'href='".$link."'>".$value['vod_name']."</a></h5>";
$ajaxtxt.="<div class='user-todo'><a class='ui-edit savelove fav-add' href='".getAppPatht()."User-Center-savelove-id-".$value['vod_id']."'>收藏</a></div>";
$ajaxtxt.="</li>";
}
exit($ajaxtxt);
}
public function getremind(){
$list = D("User.User");
$datas =$list->getRemindDatas($this->memberinfo['userid']) ;
$result = array() ;
$ajaxtxt = "";
foreach ($datas as $key =>$value){
$link = ff_data_url('vod',$value['vod_id'],$value['vod_cid'],$value['vod_name'],1,$value['vod_jumpurl']);
$ajaxtxt.="<li>";
$ajaxtxt.="<a target='_blank' class='play-img' href='".$link."'>";
$ajaxtxt.="<img src='".ff_img_url($value['vod_pic'],$value['vod_content'])."' alt='".$value['vod_name']."'/>";
$ajaxtxt.="</a>";
$ajaxtxt.="<h5><a target='_blank 'href='".$link."'>".$value['vod_name']."</a></h5>";
$ajaxtxt.="<div class='user-todo'><a class='ui-edit savelove fav-add' href='".getAppPatht()."User-Center-saveremind-id-".$value['vod_id']."'>订阅</a></div>";
$ajaxtxt.="</li>";
}
exit($ajaxtxt);
}
public function saveRemind(){
$result = array();
$id = $_GET["id"] ;
if(isset($id)){
$rs = D("Vod");
$cid = $rs->where(array('vod_id'=>$id))->getField('vod_cid') ;
$rootid = getParentCatalog($cid);
$fav = D("Remind");
$data['vod_id'] = $id ;
$data['user_id'] = $this->memberinfo['userid'];
$data['vod_cid'] = $rootid;
$data['cdate'] = time();
$id = $fav->add($data) ;
if($id >0){
$list = D("User.User");
$dhtxt = "<li class='current'><a href='".getAppPatht()."User-Center-love-op-1'>全部</a></li>";
$catalogs =$list->getCatalogs($this->memberinfo['userid']) ;
foreach ($catalogs as $key =>$value){
$dhtxt.= "<li class='line'></li><li><a href='".getAppPatht()."User-Center-love-op-1-pid-".$value['id']."' hidefocus=''>".$value['name']."<span>".$value['count']."</span></a></li>";
}
$result = array("msg"=>"成功添加订阅","rcode"=>1,"dhtxt"=>$dhtxt);
}else{
$result = array("msg"=>"添加订阅失败".$id,"rcode"=>-1);
}
}else{
$result = array("msg"=>"添加订阅失败","rcode"=>-1);
}
exit(json_encode($result));
}
public function delremind(){
$pid = $_GET["pid"] ;
$lid = $_GET["lid"] ;
$result = array();
if(isset($pid) &&isset($lid)){
$rs = D("Remind");
$where = array('vod_id'=>$lid,'vod_cid'=>$pid,'user_id'=>$this->memberinfo['userid']);
$rs->where($where)->delete();
$list = D("User.User");
$dhtxt = "<li class='current'><a href='".getAppPatht()."User-Center-remind-op-1'>全部</a></li>";
$catalogs =$list->getRemindCatalogs($this->memberinfo['userid']) ;
foreach ($catalogs as $key =>$value){
$dhtxt.= "<li class='line'></li><li><a href='".getAppPatht()."User-Center-remind-op-1-pid-".$value['id']."' hidefocus=''>".$value['name']."<span>".$value['count']."</span></a></li>";
}
$result = array("msg"=>"删除成功","rcode"=>"1","dhtxt"=>$dhtxt);
}else if(isset($_POST["delids"])){
$delids = $_POST["delids"] ;
$rs = D("Remind");
$where['user_id'] = array('eq',$this->memberinfo['userid']);
$where['vod_id'] = array('in',$delids);
$rs->where($where)->delete();
$list = D("User.User");
$dhtxt = "<li class='current'><a href='".getAppPatht()."User-Center-remind-op-1'>全部</a></li>";
$catalogs =$list->getRemindCatalogs($this->memberinfo['userid']) ;
foreach ($catalogs as $key =>$value){
$dhtxt.= "<li class='line'></li><li><a href='".getAppPatht()."User-Center-remind-op-1-pid-".$value['id']."' hidefocus=''>".$value['name']."<span>".$value['count']."</span></a></li>";
}
$result = array("msg"=>"删除成功","rcode"=>"1","dhtxt"=>$dhtxt);
}else{
$result = array("msg"=>"删除失败","rcode"=>"-1");
}
exit(json_encode($result));
}
public function remindset(){
$memberinfo = $this->memberinfo;
if($_POST['action']=='change'){
$mod = M('user');
$res = $mod->where("userid='{$memberinfo['userid']}'")->save($_POST);
if($res>=0){
$result = array('rcode'=>'1','msg'=>'修改成功!');
}else{
$result = array('rcode'=>'-1','msg'=>'修改失败!');
}
exit(json_encode($result));
}else{
$menus = get_menus();
$this->assign("menus",$menus) ;
$this->assign("action","remindset");
$this->assign("catalogs",$catalogs) ;
$this->assign("memberinfo",$memberinfo);
$this->display('./Public/user/user_remindset.html');
}
}
public function comm(){
$menus = get_menus();
$this->assign("menus",$menus) ;
$this->assign("action","comm");
$memberinfo = $this->memberinfo;
$this->assign("memberinfo",$memberinfo);
$this->display('./Public/user/user_comm.html');
}
public function getcomms(){
$rs = D("User.User");
$limit = 10 ;
$currentpage = !empty($_GET['p'])?intval($_GET['p']):1;
$total = $rs->getCommsTotal($this->memberinfo['userid']);
$totalpages = ceil($total/$limit);
if($currentpage >$totalpages){
$currentpage = $totalpages ;
}
$pager = array('limit'=>$limit,'currentpage'=>$currentpage);
$datas = $rs->getComms($this->memberinfo['userid'],$pager);
$linkPage = '';
if($totalpages >1){
$linkPage = "<div class='info fn-left'>共".$total."部记录&nbsp;当前:".$currentpage."/".$totalpages."页&nbsp;</div>";
$linkPage .= "<div class='pages fn-right'>";
if($currentpage >1){
$linkPage .="<a href='".getAppPatht()."User-Center-getcomms-p-1' class=' pagegbk'>首页</a>&nbsp;";
$linkPage .="<a href='".getAppPatht()."User-Center-getcomms-p-".($currentpage-1).".html' class='prev pagegbk'>上一页</a>&nbsp;";
}else{
$linkPage .= "<span class=' disabled'>首页</span>&nbsp;";
$linkPage .= "<span class='prev disabled'>上一页</span>&nbsp;";
}
$halfPer = 4;
for($i=$currentpage-$halfPer,$i>1 ||$i=1,$j=$currentpage+$halfPer,$j<$totalpages||$j=$totalpages;$i<$j+1;$i++){
$linkPage .= ($i==$currentpage)?
"<span class='current'>".$i."</span>&nbsp;"
:
"<a href='".getAppPatht()."User-Center-getcomms-p-".$i.".html'>".$i."</a>&nbsp;";
}
if($currentpage <$totalpages){
$linkPage .= "<a href='".getAppPatht()."User-Center-getcomms-p-".($currentpage+1).".html' class='next pagegbk'>下一页</a> ";
$linkPage .= "<a href='".getAppPatht()."User-Center-getcomms-p-".($totalpages).".html' class=' pagegbk'>尾页</a> ";
}else{
$linkPage .="<span class='next disabled'>下一页</span>";
$linkPage .="<span class=' disabled'>尾页</span>";
}
$linkPage .="</div>";
}
$result = array() ;
$ajaxtxt = $this->outputCommsData($datas);
$result['ajaxtxt'] = $ajaxtxt;
$result['pages'] = $linkPage;
$result['sql'] = $rs->getLastSql();
exit(json_encode($result));
}
private function outputCommsData($datas){
$html= "";
foreach ($datas as $key =>$value){
if(is_array($value)){
$link = ff_data_url('vod',$value['vod_id'],$value['vod_cid'],$value['vod_name'],1,$value['vod_jumpurl']);
$comment_id = $value['comment_id'];
$html.="<li>";
$html.="<label class='label-checkbox' for='cmt".$comment_id."' hidefocus>";
$html.="<input type='checkbox' name='ids[]' value='".$comment_id."' id='cmt".$comment_id."' />";
$html.="</label>";
$html.="<div class='user-txt-list-cnt'>";
$html.="<h5><a href='".$link."'>".$value['vod_name']."</a></h5>";
$html.="<p id='contmedit".$comment_id."'>".$value['content']."</p>";
$html.="<div class='my-list-assit fn-clear'>";
$html.="<div class='fn-left'>";
$html.="<span class='list-digg'>支持[<strong>".$value['support']."</strong>]</span><em>|</em>";
$html.="<span class='list-digg'>反对[<strong>".$value['oppose']."</strong>]</span><em>|</em>";
$html.="<a class='mdel' href='javascript:void(0)' id='mdel".$comment_id."' data='".getAppPatht()."User-Center-delcomm-ids-".$comment_id."'>删除</a>";
$html.="</div>";
$html.="<div class='fn-right'><span class='date-time'>".date("Y-m-d H:i:s",$value['creat_at'])."</span></div>";
$html.="</div>";
$html.="</div>";
$html.="</li>";
}
}
return $html;
}
public function delcomm(){
$comment_ids = $_GET["ids"] ;
$result = array();
if(isset($comment_ids)){
$rs = D("Comment");
$where = array('comment_id'=>$comment_ids);
$rs->where($where)->delete();
$result = array("msg"=>"删除成功","rcode"=>"1");
}else if(isset($_POST["ids"])){
$comment_ids = $_POST["ids"];
$rs = D("Comment");
$where['comment_id'] = array('in',$comment_ids);
$rs->where($where)->delete();
$result = array("t"=>$rs->getLastSql());
}
exit(json_encode($result));
}
public function getinfocomm(){
$rs = D("User.User");
$limit = 8 ;
$currentpage = !empty($_GET['p'])?intval($_GET['p']):1;
$total = $rs->getCommsTotal($this->memberinfo['userid']);
$totalpages = ceil($total/$limit);
if($currentpage >$totalpages){
$currentpage = $totalpages ;
}
$pager = array('limit'=>$limit,'currentpage'=>$currentpage);
$datas = $rs->getinfocomms($this->memberinfo['userid'],$pager);
$linkPage = '';
if($totalpages >1){
$linkPage = "<div class='info fn-left'>共".$total."部记录&nbsp;当前:".$currentpage."/".$totalpages."页&nbsp;</div>";
$linkPage .= "<div class='pages fn-right'>";
if($currentpage >1){
$linkPage .="<a href='".getAppPatht()."User-Center-getcomms-p-1' class=' pagegbk'>首页</a>&nbsp;";
$linkPage .="<a href='".getAppPatht()."User-Center-getcomms-p-".($currentpage-1).".html' class='prev pagegbk'>上一页</a>&nbsp;";
}else{
$linkPage .= "<span class=' disabled'>首页</span>&nbsp;";
$linkPage .= "<span class='prev disabled'>上一页</span>&nbsp;";
}
$halfPer = 4;
for($i=$currentpage-$halfPer,$i>1 ||$i=1,$j=$currentpage+$halfPer,$j<$totalpages||$j=$totalpages;$i<$j+1;$i++){
$linkPage .= ($i==$currentpage)?
"<span class='current'>".$i."</span>&nbsp;"
:
"<a href='".getAppPatht()."User-Center-getcomms-p-".$i.".html'>".$i."</a>&nbsp;";
}
if($currentpage <$totalpages){
$linkPage .= "<a href='".getAppPatht()."User-Center-getcomms-p-".($currentpage+1).".html' class='next pagegbk'>下一页</a> ";
$linkPage .= "<a href='".getAppPatht()."User-Center-getcomms-p-".($totalpages).".html' class=' pagegbk'>尾页</a> ";
}else{
$linkPage .="<span class='next disabled'>下一页</span>";
$linkPage .="<span class=' disabled'>尾页</span>";
}
$linkPage .="</div>";
}
$result = array() ;
$ajaxtxt = $this->outputinfocommsData($datas);
$result = array("rcode"=>"1","txt"=>$ajaxtxt);
$result['sql'] = $rs->getLastSql();
exit(json_encode($result));
}
private function outputinfocommsData($datas){
$avatar = ps_getavatar($memberinfo['userid']);
$image = $avatar['48'];
$html= "";
foreach ($datas as $key =>$value){
if(is_array($value)){
$link = ff_data_url('vod',$value['vod_id'],$value['vod_cid'],$value['vod_name'],1,$value['vod_jumpurl']);
$rand = uniqid();
if($value['reply']=='0'){
$action = '评论了';
}else{
$action = '回复了';
}
$html.="<li>";
$html.="<div class='news-avatar'>";
$html.="<a href='javascript:void(0);'>";
$html.="<img src='{$image}?rand={$rand}' alt='{$value['username']}'>";
$html.="</a>";
$html.="</div>";
$html.="<div class='news-box'>";
$html.="<div class='news-cnt'>";
$html.="<div class='news-cnt'>";
$html.="<a href='javascript:void(0);'>{$value['username']}</a>";
$html.="<span>{$action}</span>";
$html.="<a target='_blank' href='{$link}'>".$value['vod_name']."</a>";
$html.="<p class='cmt'><em>".$value['content']."</em></p>";
$html.="</div>";
$html.="</div>";
$html.="<div class='news-ft'>".date("Y-m-d H:i:s",$value['creat_at'])."</div>";
$html.="</div>";
$html.="</li>";
}
}
return $html;
}
public function playlog(){
$menus = get_menus();
$this->assign("menus",$menus) ;
$this->assign("action","playlog");
$memberinfo = $this->memberinfo;
$this->assign("memberinfo",$memberinfo);
$this->display('./Public/user/user_playlog.html');
}
public function getlogs(){
$rs = D("User.User");
$limit = 10 ;
$currentpage = !empty($_GET['p'])?intval($_GET['p']):1;
$total = $rs->getPlayLogTotal($this->memberinfo['userid']);
$totalpages = ceil($total/$limit);
if($currentpage >$totalpages){
$currentpage = $totalpages ;
}
$pager = array('limit'=>$limit,'currentpage'=>$currentpage);
$datas = $rs->getPlayLogs($this->memberinfo['userid'],$pager);
$linkPage = '';
if($totalpages >1){
$linkPage = "<div class='info fn-left'>共".$total."部记录&nbsp;当前:".$currentpage."/".$totalpages."页&nbsp;</div>";
$linkPage .= "<div class='pages fn-right'>";
if($currentpage >1){
$linkPage .="<a href='".getAppPatht()."User-Center-getlogs-p-1' class=' pagegbk'>首页</a>&nbsp;";
$linkPage .="<a href='".getAppPatht()."User-Center-getlogs-p-".($currentpage-1).".html' class='prev pagegbk'>上一页</a>&nbsp;";
}else{
$linkPage .= "<span class=' disabled'>首页</span>&nbsp;";
$linkPage .= "<span class='prev disabled'>上一页</span>&nbsp;";
}
$halfPer = 4;
for($i=$currentpage-$halfPer,$i>1 ||$i=1,$j=$currentpage+$halfPer,$j<$totalpages||$j=$totalpages;$i<$j+1;$i++){
$linkPage .= ($i==$currentpage)?
"<span class='current'>".$i."</span>&nbsp;"
:
"<a href='".getAppPatht()."User-Center-getlogs-p-".$i.".html'>".$i."</a>&nbsp;";
}
if($currentpage <$totalpages){
$linkPage .= "<a href='".getAppPatht()."User-Center-getlogs-p-".($currentpage+1).".html' class='next pagegbk'>下一页</a> ";
$linkPage .= "<a href='".getAppPatht()."User-Center-getlogs-p-".($totalpages).".html' class=' pagegbk'>尾页</a> ";
}else{
$linkPage .="<span class='next disabled'>下一页</span>";
$linkPage .="<span class=' disabled'>尾页</span>";
}
$linkPage .="</div>";
}
$result = array() ;
$ajaxtxt = $this->outputLogsData($datas);
$result['ajaxtxt'] = $ajaxtxt;
$result['pages'] = $linkPage;
$result['sql'] = $rs->getLastSql();
exit(json_encode($result));
}
public function dellog(){
$result =  array("rcode"=>"-1");
if(!empty($_GET['id'])){
$rs = M("Playlog") ;
$rs->where(array('log_id'=>$_GET['id']))->delete();
$result =  array("rcode"=>"1");
}
exit(json_encode($result));
}
public function delalllog(){
$rs = M("Playlog") ;
$rs->where(array('userid'=>$this->memberinfo['userid']))->delete();
$result =  array("rcode"=>"1");
exit(json_encode($result));
}
public function outputLogsData($datas){
$html= "";
foreach ($datas as $key =>$value){
if(is_array($value)){
$data['id'] = $value['log_id'];
$data['vod_name'] = $value['vod_name'];
$data['url_name'] = $value['url_name'];
$readurl = ff_data_url('vod',$value['vod_id'],$value['vod_cid'],$value['vod_name'],1,$value['vod_jumpurl']);
$palyurl = ff_play_url($value['vod_id'],$value['vod_sid'],$value['vod_pid'],$value['vod_cid'],$value['vod_name']);
$html.="<li>";
$html.="<p class='title'><a target='_blank' href='".$readurl."'>".$value['vod_name']."</a>/";
$html.="<a target='_blank' href='".$palyurl."'>".$value['url_name']."</a></p>";
$html.="<p class='morelook'><a target='_blank' href='".$palyurl."'>重新观看</a>";
$currentJi = $value['vod_pid'] ;
$maxJi = $value['vod_maxnum'] ;
if($currentJi <$maxJi){
$nextplaylink = ff_play_url($value['vod_id'],$value['vod_sid'],$value['vod_pid']+1,$value['vod_cid'],$value['vod_name']);
$html.="|<a target='_blank' href='".$nextplaylink."'>下一集</a>";
}
$html.="</p>";
$html.="<p class='time'>".date("Y-m-d H:i:s",$value['creat_time'])."</p>";
$html.="<a href='javascript:;' class='ui-del del' data='".getAppPatht()."User-Center-dellog-id-".$value['log_id']."' hidefocus=''>删除</a>";
$html.="</li>";
}
}
return $html;
}
public function gb(){
$gb=M(gb);
$rs = D("User.User");
if($_GET["op"] == "1"){
$list = $rs->getFavoritList($this->memberinfo['userid'],$_GET["pid"]) ;
$result = $this->outputFavoritDatas($list);
exit(json_encode($result));
}else if($_GET["op"] ==2){
}else{
$catalogs =$rs->getCatalogs($this->memberinfo['userid']) ;
$menus = get_menus();
$this->assign("menus",$menus);
$this->assign("action","gb");
$this->assign("catalogs",$catalogs) ;
$myComment = $gb->where("gb_uid='{$this->memberinfo['userid']}'")->select();
$memberinfo = $this->memberinfo;
$this->assign("memberinfo",$memberinfo);
$this->assign("myComment",$myComment);
$this->display('./Public/user/user_gb.html');
}
}
public function addGuestbook(){
$_POST['gb_uid']=$this->memberinfo['userid'];
if(C('user_check') >0){
$user_check = 0;}
else{
$user_check = 1;
}
$rs = D("Guestbook");
C('TOKEN_ON',false);
if($rs->create()){
if (false !== $rs->add()){
if($_POST['action']!='ajax'){
$cookie = 'gbook-'.intval($_POST['gb_cid']);
setcookie($cookie,'true',time()+intval(C('user_second')));
}
if (C('user_check') >0){
if($_POST['action']=='ajax'){
$result = array('rcode'=>'1','msg'=>'留言成功，我们会尽快审核您的留言!');
exit(json_encode($result));
}else{
$this->success('留言成功，我们会尽快审核您的留言！');
}
}else{
if($_POST['action']=='ajax'){
$result = array('rcode'=>'1','msg'=>'恭喜您，留言成功!');
exit(json_encode($result));
}else{
$this->success('恭喜您，留言成功！');
}
}
}else{
if($_POST['action']=='ajax'){
$result = array('rcode'=>'-1','msg'=>'留言失败，请重试！');
exit(json_encode($result));
}else{
$this->error('留言失败，请重试！');
}
}
}else{
if($_POST['action']=='ajax'){
$result = array('rcode'=>'-1','msg'=>'留言失败哦，请重试！');
exit(json_encode($result));
}else{
$this->error($rs->getError());
}
}
}
public function getGuestbook(){
$result = array() ;
$ajaxtxt = "";
$gb_cid = $_GET['gid'];
$html = '';
$gb=M('guestbook');
if($gb_cid=='all'){
$myComment = $gb->where("gb_uid='{$this->memberinfo['userid']}' and gb_status='1'")->select();
}else{
$myComment = $gb->where("gb_uid='{$this->memberinfo['userid']}' and gb_cid='{$gb_cid}' and gb_status='1'")->select();
}
foreach($myComment as $key=>$val){
$time = date("Y-m-d H:i:s",$val['gb_addtime']);
if(empty($val['gb_intro'])){
$html.="				<li>
	     			<label class=\"label-checkbox\" hidefocus=\"\"><input name=\"gb[]\" value=\"{$val['gb_id']}\" type=\"checkbox\" /></label>
	     			<div class=\"user-txt-list-cnt\">
	     				<h5><span class=\"date-time\">{$time}</span><strong>{$val['gb_title']}</strong></h5>
	     				<p>{$val['gb_content']}</p>
	     			</div>
	     		</li>";
}else{
$html.="				<li>
	     			<label class=\"label-checkbox\" hidefocus=\"\"><input name=\"gb[]\" value=\"{$val['gb_id']}\" type=\"checkbox\" /></label>
	     			<div class=\"user-txt-list-cnt\">
	     				<h5><span class=\"date-time\">{$time}</span><strong>{$val['gb_title']}</strong></h5>
	     				<p>{$val['gb_content']}</p>
	     				<div class=\"mymsg-list-cnt\">
     						<strong>管理员回复：</strong>{$val['gb_intro']}
     					</div>
	     			</div>
	     		</li>";
}
}
$result["pages"]="";
$result["ajaxtxt"]=$html;
echo json_encode($result);
}
public function getMyComment(){
$result = array() ;
$ajaxtxt = "";
$gb_cid = $_GET['gid'];
$html = '';
$gb=M('guestbook');
if($gb_cid=='all'){
$myComment = $gb->where("gb_uid='{$this->memberinfo['userid']}'")->select();
}else{
$myComment = $gb->where("gb_uid='{$this->memberinfo['userid']}' and gb_cid='{$gb_cid}'")->select();
}
foreach($myComment as $key=>$val){
$time = date("Y-m-d H:i:s",$val['gb_addtime']);
if(empty($val['gb_intro'])){
$html.="				<li>
	     			<label class=\"label-checkbox\" hidefocus=\"\"><input name=\"gb[]\" value=\"{$val['gb_id']}\" type=\"checkbox\" /></label>
	     			<div class=\"user-txt-list-cnt\">
	     				<h5><span class=\"date-time\">{$time}</span><strong>{$val['gb_title']}</strong></h5>
	     				<p>{$val['gb_content']}</p>
                        <div class=\"mymsg-list-cnt\">
     						<strong>管理员回复：</strong>我们会尽快回复您。
     					</div>
	     			</div>
	     		</li>";
}else{
$html.="				<li>
	     			<label class=\"label-checkbox\" hidefocus=\"\"><input name=\"gb[]\" value=\"{$val['gb_id']}\" type=\"checkbox\" /></label>
	     			<div class=\"user-txt-list-cnt\">
	     				<h5><span class=\"date-time\">{$time}</span><strong>{$val['gb_title']}</strong></h5>
	     				<p>{$val['gb_content']}</p>
	     				<div class=\"mymsg-list-cnt\">
     						<strong>管理员回复：</strong>{$val['gb_intro']}
     					</div>
	     			</div>
	     		</li>";
}
}
$result["pages"]="";
$result["ajaxtxt"]=$html;
echo json_encode($result);
}
public function delMyMessage(){
$gb = M('guestbook');
$dhtxt = '';
$gb_id = implode(',',$_POST['gb']);
$result =$gb->where("find_in_set(gb_id,'{$gb_id}')")->delete();
if($result){
$result = array("msg"=>"删除成功","rcode"=>"1","dhtxt"=>$dhtxt);
}else{
$result = array("msg"=>"删除失败","rcode"=>"-1","dhtxt"=>$gb_id);
}
exit(json_encode($result));
}
}
// 
?>
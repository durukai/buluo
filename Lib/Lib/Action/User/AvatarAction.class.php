<?php

class AvatarAction extends Action {
public  $data;
public function __construct() {
if(isset($_GET) &&is_array($_GET) &&count($_GET) >0) {
foreach($_GET as $k=>$v) {
$_POST[$k] = $v;
}
}
if(!isset($_POST["auth_data"])){
exit('0') ;
}
$userid = sys_auth($_POST["auth_data"],'DECODE',md5($this->getSystemAuthKey()));
if(empty($userid)){
exit('0') ;
}
$this->data['user_id'] = $userid ;
if(isset($GLOBALS['HTTP_RAW_POST_DATA'])) {
$this->data['avatardata'] = $GLOBALS['HTTP_RAW_POST_DATA'];
}
}
private function  getSystemAuthKey(){
$member_setting = F("_user/setting");
$auth_key = "123";
if($member_setting['auth_key']) {
$auth_key = $member_setting['auth_key'];
}
return $auth_key ;
}
public function uploadavatar(){
$uid = null;
$avatardata = null ;
if(isset($this->data['user_id']) &&isset($this->data['avatardata'])) {
$uid = $this->data['user_id'];
$avatardata = $this->data['avatardata'];
}else{
exit('0');
}
$dir1 = ceil($uid / 10000);
$dir2 = ceil($uid %10000 / 1000);
$avatarfile = CMS_PATH.'Uploads/ffcms/';
$dir = $avatarfile.$dir1.'/'.$dir2.'/'.$uid.'/';
if(!file_exists($dir)) {
mkdir($dir,0777,true);
}
$filename = $dir.$uid.'.zip';
file_put_contents($filename,$avatardata);
import('ORG.Util.PclZip');
$archive = new PclZip($filename);
if ($archive->extract(PCLZIP_OPT_PATH,$dir) == 0) {
die("Error : ".$archive->errorInfo(true));
}
$avatararr = array('180x180.jpg','30x30.jpg','45x45.jpg','90x90.jpg');
if($handle = opendir($dir)) {
while(false !== ($file = readdir($handle))) {
if($file !== '.'&&$file !== '..') {
if(!in_array($file,$avatararr)) {
@unlink($dir.$file);
}else {
$info = @getimagesize($dir.$file);
if(!$info ||$info[2] !=2) {
@unlink($dir.$file);
}
}
}
}
closedir($handle);
}
$rs = D("User.User");
$rs->updatetMemberLogin(array('avatar'=>1),$uid);
exit("1");
}
}
// 
?>
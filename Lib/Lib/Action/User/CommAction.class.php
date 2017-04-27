<?php

class CommAction extends  Action{
public $userid;
public $isLogin = false ;
public function _initialize(){
$userid = cookie('_userid');
if(!empty($userid)){
$this->userid = cookie_decode($userid);
$this->isLogin = true ;
}
}
public function dellove(){
$result = array("msg"=>"取消收藏失败","rcode"=>-1);
$id = $_GET["id"] ;
if($this->isLogin &&isset($id)){
$fav = D("Favorite");
$data['vod_id'] = $id ;
$data['user_id'] = $this->userid;
$fav->where($data)->delete();
$result['msg'] = "取消收藏成功";
$result['rcode'] = 1 ;
}
exit(json_encode($result));
}
public function savelove(){
$result = array("msg"=>"添加收藏失败","rcode"=>-1);
$id = $_GET["id"] ;
if($this->isLogin &&isset($id)){
$model =  D("User.User");
if($model->isFavoriteVod(array('vod_id'=>$id,'user_id'=>$this->userid))){
$result = array("msg"=>"已经收藏","rcode"=>-1,"yjdy"=>1);
}else{
$rs = D("Vod");
$cid = $rs->where(array('vod_id'=>$id))->getField('vod_cid') ;
$rootid = getParentCatalog($cid);
$fav = D("Favorite");
$data['vod_id'] = $id ;
$data['user_id'] = $this->userid;
$data['vod_cid'] = $rootid;
$data['cdate'] = time();
$id = $fav->add($data) ;
if($id >0){
$result['msg'] = "成功添加收藏";
$result['rcode'] = 1 ;
}
}
}
exit(json_encode($result));
}
public function saveremind(){
$result = array("msg"=>"添加订阅失败","rcode"=>-1);
$id = $_GET["id"] ;
if($this->isLogin &&isset($id)){
$model =  D("User.User");
if($model->isRemindVod(array('vod_id'=>$id,'user_id'=>$this->userid))){
$result = array("msg"=>"已经订阅","rcode"=>-1,"yjdy"=>1);
}else{
$rs = D("Vod");
$vod = $rs->where(array('vod_id'=>$id))->field('vod_cid,vod_addtime')->find();
$rootid = getParentCatalog($vod['vod_cid']);
$remind = D("remind");
$data['vod_id'] = $id ;
$data['user_id'] = $this->userid;
$data['vod_cid'] = $rootid;
$data['vod_time'] = $vod['vod_addtime'];
$data['cdate'] = time();
$id = $remind->add($data) ;
if($id >0){
$result['msg'] = "成功添加订阅";
$result['rcode'] = 1 ;
}
}
}
exit(json_encode($result));
}
public function delremind(){
$result = array("msg"=>"取消订阅失败","rcode"=>-1);
$id = $_GET["id"] ;
if($this->isLogin &&isset($id)){
$fav = D("Remind");
$data['vod_id'] = $id ;
$data['user_id'] = $this->userid;
$fav->where($data)->delete();
$result['msg'] = "取消订阅成功";
$result['rcode'] = 1 ;
}
exit(json_encode($result));
}
public function getcomm(){
$vod_id = $_GET['id'] ;
$result = array("ajaxtxt"=>'');
$total = 0 ;
if(!empty($vod_id)){
$rs = D("User.User");
$where = array('vod_id'=>$vod_id,'ispass'=>1);
$total = $rs->getPublicCommentTotal($where);
if($total >0){
$limit = 8 ;
$currentpage = !empty($_GET['p'])?intval($_GET['p']):1;
$totalpages = ceil($total/$limit);
if($currentpage >$totalpages){
$currentpage = $totalpages ;
}
$pager = array('limit'=>$limit,'currentpage'=>$currentpage);
$list = $rs->getPublicComments($where,$pager);
$result['ajaxtxt'] = $this->outputPublicCommns($list);
if($totalpages >1){
$pagebox = "<label>".$currentpage."/".$totalpages."</label>";
$pagesx = '';
if($currentpage <= 1){
$pagebox.="<span class='prev disabled'>上一页</span>";
$pagesx.="<span class=' disabled'>首页</span>";
$pagesx.="<span class='prev disabled'>上一页</span>";
}else {
$pagebox.="<a href='".getAppPatht()."User-Comm-getcomm-id-".$vod_id."-p-".($currentpage-1)."' class='prev'>上一页</a>";
$pagesx.="<a href='".getAppPatht()."User-Comm-getcomm-id-".$vod_id."-p-1' class=' pagegbk'>首页</a>";
$pagesx.="<a href='".getAppPatht()."User-Comm-getcomm-id-".$vod_id."-p-".($currentpage-1)."' class='prev pagegbk'>上一页</a>";
}
$halfPer = 4;
for($i=$currentpage-$halfPer,$i>1 ||$i=1,$j=$currentpage+$halfPer,$j<$totalpages||$j=$totalpages;$i<$j+1;$i++){
$pagesx .= ($i==$currentpage)?
"<span class='current'>".$i."</span>&nbsp;":"<a href='".getAppPatht()."User-Comm-getcomm-id-".$vod_id."-p-".$i."'>".$i."</a>&nbsp;";
}
if($currentpage >= $totalpages){
$pagebox.="<span class='next disabled'>下一页</span>";
$pagesx.="<span class='next disabled'>下一页</span>";
$pagesx.="<span class=' disabled'>尾页</span>";
}else{
$pagebox.="<a href='".getAppPatht()."User-Comm-getcomm-id-".$vod_id."-p-".($currentpage+1)."' class='next'>下一页</a>";
$pagesx.="<a href='".getAppPatht()."User-Comm-getcomm-id-".$vod_id."-p-".($currentpage+1)."' class='next pagegbk'>下一页</a>";
$pagesx.="<a href='".getAppPatht()."User-Comm-getcomm-id-".$vod_id."-p-".($totalpages)."' class=' pagegbk'>尾页</a>";
}
$result['pages'] = $pagebox;
$result['pagesx'] = $pagesx;
}
}
$data = $rs->getMark($vod_id);
$start = array();
$value = $rs->getMarkValue($vod_id,get_client_ip());
if($value >0){
$start['hadpingfen'] = 1 ;
$start['mystars'] = $value ;
}else{
$start['mystars'] = 0 ;
}
$start['curpingfen'] = array();
if($data != null){
$start['curpingfen']['a'] = $data['F5'];
$start['curpingfen']['b'] = $data['F4'];
$start['curpingfen']['c'] = $data['F3'];
$start['curpingfen']['d'] = $data['F2'];
$start['curpingfen']['e'] = $data['F1'];
$rate = $this->getPingfen($data) ;
if(count($rate) >0){
$start['curpingfen']['pinfenb'] = $rate['R2'];
$start['curpingfen']['pinfen'] = $rate['R1'];
}
}
$start['curpingfen']['num'] = $total;
if($this->isLogin){
if($rs->isFavoriteVod(array('vod_id'=>$vod_id,'user_id'=>$this->userid))){
$start['loveid']=$vod_id ;
}
if($rs->isRemindVod(array('vod_id'=>$vod_id,'user_id'=>$this->userid))){
$start['remindid']=$vod_id ;
}
}
$result['star']=$start ;
}
exit(json_encode($result));
}
public function getPingfen($data){
$f1 = $data['F1'] ;
$f2 = $data['F2'] ;
$f3 = $data['F3'] ;
$f4 = $data['F4'] ;
$f5 = $data['F5'] ;
$pftotal = $f1 +$f2 +$f3 +$f4 +$f5 ;
$array = array();
if($pftotal >0){
$rating = ($f1/$pftotal)*1 +($f2/$pftotal)*2  +($f3/$pftotal)*3 +($f4/$pftotal)*4 +($f5/$pftotal)*5 ;
$r1 = round($rating * 2,1) ;
$array["R1"] = number_format($r1,1) ;
$array["R2"] = $r1*10 ;
}
return $array;
}
private function outputPublicCommns($list){
$ajaxtxt = "";
foreach ($list as $key =>$value){
$url = getAppPath().getavatar()."".$value['userid']."_avatar_small.jpg";
if(@fopen($url,'r')){
$avatar = ps_getavatar($value['userid']);
$image = $avatar['48'];
}else{
$image = getAppPath()."Public/user/images/noavatar_small.gif";
}
$ajaxtxt.="<li id='li".$value['comment_id']."' class='comment-item fn-clear'>";
$ajaxtxt.="<div class='comment-time'><p class='date-time'><strong>".date("m-d H:i",$value['creat_at'])."</strong></p></div>";
$ajaxtxt.="<div class='comment-post'>";
$ajaxtxt.="<div class='comment-post-arrow'></div>";
$ajaxtxt.="<div class='comment-post-cnt'>";
$ajaxtxt.="<div class='comment-avatar'><a href='javascript:void(0)'><img src='".$image."' alt='".$value['username']."'></a></div>";
$ajaxtxt.="<div class='comment-body'>";
$ajaxtxt.="<div class='comment-text'>".$value['content']."</div>";
$ajaxtxt.="<div class='comment-assist fn-clear'>";
$ajaxtxt.="<p class='fn-left'><span class='digg'><a href='javascript:void(0)' class='sup' data='".getAppPatht()."User-comm-digg-id-".$value['comment_id']."-type-sup'>支持(<strong>".$value['support']."</strong>)</a></span><span class='digg'><a href='javascript:void(0)' class='opp' data='".getAppPatht()."User-comm-digg-id-".$value['comment_id']."-type-opp'>反对(<strong>".$value['oppose']."</strong>)</a></span></p>";
$ajaxtxt.="<p class='fn-right'><a href='javascript:void(0)' data='".$value['comment_id']."' class='reply'>回复</a></p>";
$ajaxtxt.="</div>";
$ajaxtxt.="<div id='rep".$value['comment_id']."' class='comms'></div>";
$ajaxtxt.="</div>";
$ajaxtxt.="</div>";
$ajaxtxt.="<div class='fn-clear'></div>";
$ajaxtxt.="</div>";
$ajaxtxt.="</li>";
}
return $ajaxtxt;
}
public function digg(){
$comment_id = $_GET['id'];
$type = $_GET['type'];
$success = false;
if(!empty($comment_id) &&!empty($type)){
$rs = M("Comment_opinion");
$ip = get_client_ip();
$count = $rs->where(array('comment_id'=>$comment_id,'ip'=>$ip))->count();
if($count >0){
$result = array("msg"=>"已经点评","rcode"=>"-1");
$success = true ;
}else{
$opinion = -1 ;
$key = '';
if($type == 'sup'){
$opinion = 1 ;
$key = 'support';
}else if($type == 'opp'){
$opinion = 0 ;
$key = 'oppose';
}
if($opinion>=0){
$data['comment_id'] = $comment_id ;
$data['opinion'] = $opinion ;
$data['creat_date'] = time() ;
$data['ip'] = $ip ;
$id = $rs->add($data);
if($id >0){
$comment = M("Comment");
$addValue = $comment->where(array('comment_id'=>$comment_id))->getField($key);
$addValue+= 1 ;
$comment->save(array($key=>$addValue,'comment_id'=>$comment_id));
$result = array("msg"=>"成功点评","rcode"=>"1");
$success = true ;
}
}
}
}
if(!$success){
$result = array("msg"=>"点评失败","rcode"=>"-1");
}
exit(json_encode($result));
}
public function getrecomm(){
if(C('user_check') >0){
$user_check = 0;}
else{
$user_check = 1;
}
$vod_id = $_POST['revod_id'];
$comm_id = $_POST['comm_id'];
$re_content = $_POST['recomm_txt'];
$member = null ;
$rs = D("User.User");
if($this->isLogin){
$member = $rs->getMember(array('userid'=>$this->userid));
}
$result = null;
if($member){
if(strlen($re_content) == 0){
$result = array("msg"=>"内容不能为空,请填写提交内容!","rcode"=>"-1");
}else{
$comment = array();
$time = time();
$comment['vod_id'] = $vod_id;
$comment['userid'] = $member['userid'];
$comment['username'] = $member['username'];
$comment['creat_at'] = $time;
$comment['ip'] = get_client_ip();;
$comment['status'] = $user_check;
$comment['ispass'] = $user_check ;
$comment['reply'] = 1 ;
$comment['pid'] = $comm_id ;
$_c = $rs->getCommentById($comm_id);
if($_c){
$_c = str_replace("'","\'",$_c);
$re_content.="&nbsp;&nbsp;<span class=\'comment_select\'>@</span>".$_c;
}
$html ="<span class=\'comment_select\'>".$member['nickname']."</span>：".$re_content;
$comment['content'] = $html;
$comment_id = $rs->saveComment($comment);
if (C('user_check') >0) {
if($comment_id >0){
$result = array("msg"=>"回复评论成功,我们会尽快审核你的留言！","rcode"=>"1");
}else{
$result = array("msg"=>"回复评论失败","rcode"=>"-1");
}}
else{
$result = array("msg"=>"回复评论成功","rcode"=>"1");
}
}
}else{
$result = array("msg"=>"请先登录","rcode"=>"-1");
}
exit(json_encode($result));
}
public function addcomm(){
if(C('user_check') >0){
$user_check = 0;}
else{
$user_check = 1;
}
$member = null ;
$rs = D("User.User");
if($this->isLogin){
$member = $rs->getMember(array('userid'=>$this->userid));
}
$result = null;
if($member){
$comm_txt = remove_xss($_POST['comm_txt']);
if(empty($comm_txt) ||$comm_txt == '请在这里发表您的个人看法，最多1000个字。'){
$result = array("msg"=>"内容不能为空,请填写提交内容!","rcode"=>"-1");
}else{
if(strlen($comm_txt)>1000){
$result = array("msg"=>"内容太长","rcode"=>"-1");
}else{
$vod_id = $_POST['vod_id'];
$where = array('userid'=>$this->userid,'pid'=>0,'vod_id'=>$vod_id);
$comm_txt = str_replace("'","\'",$comm_txt);
$array = explode('|',C('user_replace'));
$comm_txt = trim(str_replace($array,'***',nb(nr($comm_txt))));
if(false &&$rs->isCommitComment($where)){
$result = array("msg"=>"已经提交过评论不能在评论了!","rcode"=>"-1");
}else{
$html ="<span class=\'comment_select\'>".$member['nickname']."</span>：".$comm_txt ;
$comment = array();
$time = time();
$comment['vod_id'] = $_POST['vod_id'];
$comment['userid'] = $member['userid'];
$comment['username'] = $member['username'];
$comment['creat_at'] = $time;
$comment['ip'] = get_client_ip();;
$comment['status'] = $user_check;
$comment['content'] = $html;
$comment['pid'] = 0 ;
$comment['ispass'] = $user_check ;
$comment_id = $rs->saveComment($comment);
if (C('user_check') >0) {
if($comment_id >0){
$result = array("msg"=>"评论提交成功,我们会尽快审核你的留言！","rcode"=>"1");
}else{
$result = array("msg"=>"评论提交失败","rcode"=>"-1");
}}
else{
$result = array("msg"=>"评论提交成功","rcode"=>"1");
}
}
}
}
}else{
$result = array("msg"=>"请先登录","rcode"=>"-1");
}
exit(json_encode($result));
}
public function mark(){
$vod_id = $_POST['id'];
$value = $_POST['val'] ;
$result =  array("msg"=>"提交评分失败","rcode"=>"-1");;
if(isset($vod_id) &&isset($value)){
if($value == "1"||$value == "2"||$value == "3"||$value == "4"||$value == "5"){
$rs = D("Vod_mark");
$ip = get_client_ip();
$count = $rs->where(array('ip'=>$ip,'vod_id'=>$vod_id))->count();
if($count >0){
$result['msg'] = "已经评分,请务重复评分";
$result['rcode'] = -2 ;
}else{
$mark = array();
$mark['vod_id'] = $vod_id;
$mark['ip'] = $ip;
$mark['creat_date'] = time();
$mark['F'.$value] = 1 ;
if($rs->add($mark)>0){
$result['msg'] = "提交评分成功";
$result['rcode'] = 1 ;
$member = D("User.User");
$data = $member->getMark($vod_id);
$rate = $this->getPingfen($data) ;
if(count($rate) >0){
$vod = M("Vod") ;
$vod->save(array(
'vod_gold'=>$rate['R1'],
'vod_id'=>$vod_id
)) ;
}
}
}
}
}
exit(json_encode($result));
}
public function addplaylog(){
$result =  array("rcode"=>"-1");
if($this->isLogin){
$vod_id = $_POST['vod_id'] ;
$rs = M("Playlog") ;
$rs->where(array("vod_id"=>$vod_id,"userid"=>$this->userid))->delete();
$data  = array();
$data["vod_id"] = $vod_id ;
$data["vod_sid"] = $_POST['vod_sid'] ;
$data["vod_pid"] = $_POST['vod_pid'] ;
$data["vod_name"] = $_POST['vod_name'] ;
$data["url_name"] = $_POST['url_name'] ;
$data["vod_maxnum"] = $_POST['vod_maxnum'] ;
$data["userid"] = $this->userid;
$data["creat_time"] = time() ;
$rs->add($data) ;
}
}
public function getplaylog(){
$result =  array("rcode"=>"-1");
$result["r"] =  $array ;
if($this->isLogin){
$rs = M("Playlog") ;
$order = C('db_prefix').'playlog.creat_time desc ';
$join = ' inner join '.C('db_prefix').'vod on  '.C('db_prefix').'playlog.vod_id= '.C('db_prefix').'vod.vod_id ';
$where = C('db_prefix').'playlog.userid = '.$this->userid  ;
$field = C('db_prefix').'playlog.*,'.C('db_prefix').'vod.vod_cid,'.C('db_prefix').'vod.vod_jumpurl';
$list = $rs->field($field)->join($join)->where($where)->order($order)->limit(10)->select();
$count = count($list);
if($count >0){
$array = array();
foreach ($list as $key =>$value){
$data = array();
$data['id'] = $value['log_id'];
$data['vod_name'] = $value['vod_name'];
$data['url_name'] = $value['url_name'];
$data['vod_readurl'] = ff_data_url('vod',$value['vod_id'],$value['vod_cid'],$value['vod_name'],1,$value['vod_jumpurl']);
$data['vod_palyurl'] = ff_play_url($value['vod_id'],$value['vod_sid'],$value['vod_pid'],$value['vod_cid'],$value['vod_name']);
$array[$key] = $data ;
}
$result["r"] =  $array ;
$result["rcode"] =  1 ;
}
}
exit(json_encode($result));
}
public function emptyhistory(){
$result =  array("rcode"=>"-1");
if($this->isLogin){
$rs = M("Playlog") ;
$rs->where(array('userid'=>$this->userid))->delete();
$result =  array("rcode"=>"1");
}
exit(json_encode($result));
}
public function delplaylog(){
$result =  array("rcode"=>"-1");
if($this->isLogin &&!empty($_GET['id'])){
$rs = M("Playlog") ;
$rs->where(array('log_id'=>$_GET['id']))->delete();
$result =  array("rcode"=>"1");
}
exit(json_encode($result));
}
}

?>
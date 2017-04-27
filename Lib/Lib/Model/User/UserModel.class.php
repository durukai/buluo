<?php

class UserModel extends Model {
public function checkunique($where){
$list = $this->where($where)->find();
if(NULL == $list) {
return true ;
}
return false ;
}
public function getmember($where){
$member = $this->where($where)->find();
if (NULL == $member) {
return NULL;
}
return $member;
}
public function getmemberdetail($where){
$detail = D("User_detail");
$member = $detail->where($where)->find();
if (NULL == $member) {
return NULL;
}
return $member;
}
public function updatetmemberlogin($logininfo,$userid){
return $this->where(array('userid'=>$userid))->save($logininfo);
}
public function updatetmemberdetailinfo($memberinfo,$userid){
$detail = D("User_detail");
$where = array('userid'=>$userid);
if($detail->where($where)->count()>0) {
return $detail->where($where)->save($memberinfo);
}else{
$memberinfo['userid'] = $userid ;
return $detail->add($memberinfo);
}
}
public function getFavoritList($userid,$catalog){
$rs = D("Vod");
$order = C('db_prefix').'favorite.cdate desc';
$join = C('db_prefix').'favorite on '.C('db_prefix').'favorite.vod_id = '.C('db_prefix').'vod.vod_id ';
$where = C('db_prefix').'favorite.user_id = '.$userid ;
if(!empty($catalog)){
$where = $where.' and '.C('db_prefix').'favorite.vod_cid = '.$catalog ;
}
$field = C('db_prefix').'vod.*,'.C('db_prefix').'favorite.vod_cid as pid';
$list = $rs->field($field)->join($join)->where($where)->order($order)->select();
return $list ;
}
public function getRemindList($userid,$catalog){
$rs = D("Vod");
$order = C('db_prefix').'remind.cdate desc';
$join = C('db_prefix').'remind on '.C('db_prefix').'remind.vod_id = '.C('db_prefix').'vod.vod_id ';
$where = C('db_prefix').'remind.user_id = '.$userid ;
if(!empty($catalog)){
$where = $where.' and '.C('db_prefix').'remind.vod_cid = '.$catalog ;
}
$field = C('db_prefix').'vod.*,'.C('db_prefix').'remind.vod_cid as pid';
$list = $rs->field($field)->join($join)->where($where)->order($order)->select();
return $list ;
}
public function getCatalogs($userid){
$rs = D("List");
$order = C('db_prefix').'favorite.cdate desc';
$join = ' inner join '.C('db_prefix').'favorite on '.C('db_prefix').'favorite.vod_cid = '.C('db_prefix').'list.list_id ';
$where = C('db_prefix').'favorite.user_id = '.$userid ;
$field = "list_name,list_id";
$list = $rs->field($field)->join($join)->where($where)->order($order)->select();
$vodNumArray = array() ;
foreach ($list as $key =>$value){
if(is_array($value)){
$key = $value['list_id'];
if($vodNumArray[$key]){
$vodNumArray[$key]['count'] +=1 ;
}else{
$vodNumArray[$key] = 
array('id'=>$key,'name'=>$value['list_name'],'count'=>1);
}
}
}
return $vodNumArray;
}
public function getRemindCatalogs($userid){
$rs = D("List");
$order = C('db_prefix').'remind.cdate desc';
$join = ' inner join '.C('db_prefix').'remind on '.C('db_prefix').'remind.vod_cid = '.C('db_prefix').'list.list_id ';
$where = C('db_prefix').'remind.user_id = '.$userid ;
$field = "list_name,list_id";
$list = $rs->field($field)->join($join)->where($where)->order($order)->select();
$vodNumArray = array() ;
foreach ($list as $key =>$value){
if(is_array($value)){
$key = $value['list_id'];
if($vodNumArray[$key]){
$vodNumArray[$key]['count'] +=1 ;
}else{
$vodNumArray[$key] = 
array('id'=>$key,'name'=>$value['list_name'],'count'=>1);
}
}
}
return $vodNumArray;
}
public function getLoveDatas($userid){
$rs = D("Vod");
$order = ' a.fnum desc , '.C('db_prefix').'vod.vod_addtime desc ';
$join = ' inner join ( select b.vod_id,count(b.vod_id) as fnum from '.C('db_prefix').'favorite b where not exists(select vod_id from '.C('db_prefix').'favorite c where user_id = '.$userid.' and b.vod_id = c.vod_id ) group by b.vod_id ) a  on '.C('db_prefix').'vod.vod_id = a.vod_id';
$where = C('db_prefix').'favorite.user_id = '.$userid ;
$field = C('db_prefix').'vod.*';
$list = $rs->field($field)->join($join)->order($order)->limit('10')->select();
return $list ;
}
public function getRemindDatas($userid){
$rs = D("Vod");
$order = ' a.fnum desc , '.C('db_prefix').'vod.vod_addtime desc ';
$join = ' inner join ( select b.vod_id,count(b.vod_id) as fnum from '.C('db_prefix').'remind b where not exists(select vod_id from '.C('db_prefix').'remind c where user_id = '.$userid.' and b.vod_id = c.vod_id ) group by b.vod_id ) a  on '.C('db_prefix').'vod.vod_id = a.vod_id';
$where = C('db_prefix').'remind.user_id = '.$userid ;
$field = C('db_prefix').'vod.*';
$list = $rs->field($field)->join($join)->order($order)->limit('10')->select();
return $list ;
}
public function getComms($userid,$pager){
$rs = D("Comment");
$order = C('db_prefix').'comment.creat_at desc ';
$join = ' inner join '.C('db_prefix').'vod on  '.C('db_prefix').'comment.vod_id= '.C('db_prefix').'vod.vod_id ';
$where = C('db_prefix').'comment.userid = '.$userid.' and '.C('db_prefix').'comment.ispass = 1 ';
$field = C('db_prefix').'comment.*,'.C('db_prefix').'vod.*';
$list = $rs->field($field)->join($join)->where($where)->order($order)->limit($pager['limit'])->page($pager['currentpage'])->select();
return $list ;
}
public function getinfocomms($userid,$pager){
$rs = D("Comment");
$order = C('db_prefix').'comment.creat_at desc ';
$join = ' inner join '.C('db_prefix').'vod on  '.C('db_prefix').'comment.vod_id= '.C('db_prefix').'vod.vod_id ';
$where = C('db_prefix').'comment.userid = '.$userid.' and '.C('db_prefix').'comment.ispass = 1 ';
$field = C('db_prefix').'comment.*,'.C('db_prefix').'vod.*';
$list = $rs->field($field)->join($join)->where($where)->order($order)->limit($pager['limit'])->page($pager['currentpage'])->select();
return $list ;
}
public function getCommsTotal($userid){
$rs = D("Comment");
$join = ' inner join '.C('db_prefix').'vod on  '.C('db_prefix').'comment.vod_id= '.C('db_prefix').'vod.vod_id ';
$where = C('db_prefix').'comment.userid = '.$userid.' and '.C('db_prefix').'comment.ispass = 1 ';
return $rs->join($join)->where($where)->count();
}
public function saveComment($comment){
$rs = D("Comment");
$uid = $rs->add($comment);
return $uid >0 ?true : false ;
}
public function isCommitComment($where){
$rs = D("Comment");
$count  = $rs->where($where)->count();
return $count >0 ?true : false ;
}
public function getPublicComments($where,$pager){
$rs = D("Comment");
$field = C('db_prefix').'comment.*,'.C('db_prefix').'user.avatar';
$join = ' inner join '.C('db_prefix').'user on  '.C('db_prefix').'comment.userid= '.C('db_prefix').'user.userid ';
$list = $rs->field($field)->join($join)->where($where)->order(' creat_at desc ')->limit($pager['limit'])->page($pager['currentpage'])->select();
return $list ;
}
public function getPublicCommentTotal($where){
$rs = D("Comment");
$join = ' inner join '.C('db_prefix').'user on  '.C('db_prefix').'comment.userid= '.C('db_prefix').'user.userid ';
return $rs->join($join)->where($where)->count();
}
public function getMark($vod_id){
$rs = D("Vod_mark");
$field ='sum(F1) as F1 ,sum(F2) as F2 ,sum(F3) as F3 ,sum(F4) as F4 ,sum(F5) as F5';
return $rs->field($field)->where(array('vod_id'=>$vod_id))->find();
}
public function getMarkValue($vod_id,$ip){
$rs = D("Vod_mark");
$data = $rs->field("F1,F2,F3,F4,F5")->where(array('ip'=>$ip,'vod_id'=>$vod_id))->find();
$value = -1 ;
if($data != null){
if($data['F1'] == 1){
$value = 1 ;
}else if($data['F2'] == 1){
$value = 2 ;
}else if($data['F3'] == 1){
$value = 3 ;
}else if($data['F4'] == 1){
$value = 4 ;
}else if($data['F5'] == 1){
$value = 5 ;
}
}
return $value ;
}
public function isFavoriteVod($where){
$rs = D("Favorite");
$count = $rs->where($where)->count();
return $count >0 ?true : false ;
}
public function isRemindVod($where){
$rs = D("Remind");
$count = $rs->where($where)->count();
return $count >0 ?true : false ;
}
public function getCommentById($comment_id){
$rs = M("Comment");
return $rs->where(array('comment_id'=>$comment_id))->getField("content") ;
}
public function getPlayLogTotal($userid){
$rs = M("Playlog") ;
$join = ' inner join '.C('db_prefix').'vod on  '.C('db_prefix').'playlog.vod_id= '.C('db_prefix').'vod.vod_id ';
$where = C('db_prefix').'playlog.userid = '.$this->userid  ;
$count =  $rs->join($join)->where($where)->count();
return $count ;
}
public function getPlayLogs($where,$pager){
$rs = M("Playlog") ;
$order = C('db_prefix').'playlog.creat_time desc ';
$join = ' inner join '.C('db_prefix').'vod on  '.C('db_prefix').'playlog.vod_id= '.C('db_prefix').'vod.vod_id ';
$where = C('db_prefix').'playlog.userid = '.$this->userid  ;
$field = C('db_prefix').'playlog.*,'.C('db_prefix').'vod.vod_cid,'.C('db_prefix').'vod.vod_jumpurl';
$list = $rs->field($field)->join($join)->where($where)->order($order)->limit($pager['limit'])->page($pager['currentpage'])->select();
return $list;
}
}

?>
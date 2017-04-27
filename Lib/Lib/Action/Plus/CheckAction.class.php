<?php

class CheckAction extends Action
{
public function _initialize()
{
header("Content-Type:text/html; charset=utf-8") ;
$Nav = F('_nav/list') ;
if (in_array('index.php?s=Plus-Check-VideoCheck-check_sub-ok',$Nav) === false)
{
$Nav['检测影片重名'] = 'index.php?s=Plus-Check-VideoCheck-check_sub-ok';
F('_nav/list',$Nav) ;
}
if (!$_SESSION[C('USER_AUTH_KEY')])
{
$_SESSION['AdminLogin'] = 1 ;
$this->assign('jumpUrl',C('cms_admin') .'?s=Admin-Login') ;
$this->error('对不起，您还没有登录，请先登录！') ;
}
$domain = require ('./Runtime/Conf/config.php') ;
$domain = $domain['site_url'] ;
if (C('site_url') != $domain)
{
echo '配置有误，请检查Runtime/Conf/config.php或清除Runtime/~app.php,~runtime.php';
exit ;
}

if ($_GET['mod'] == '1')
{
$_SESSION['CheckMod'] = 1 ;
}elseif ($_GET['mod'] == '2')
{
$_SESSION['CheckMod'] = 2 ;
}elseif (empty($_SESSION['CheckMod']))
{
$_SESSION['CheckMod'] = 1 ;
}
$this->assign('mod',$_SESSION['CheckMod']) ;
C('TMPL_FILE_NAME','./Public/plus/..') ;
}
public function VideoCheck()
{
if ($_REQUEST['check_sub'])
{
$Get = $this->GetParam() ;
if (!empty($Get['len']))
{
$result = $this->RepeatCheck($Get) ;
$this->assign('result',$result) ;
$this->assign('list_channel_video',F('_ppvod/listvod')) ;
}
}
$this->display('video_check') ;
}
public function RepeatCheck($Get)
{
$VodModel = D('Vod') ;
$len = $Get['len'] ;
$arr = $VodModel->field('vod_name')->Group("Left(vod_name,$len)")->Having('count(*)>1')->
select() ;
foreach ($arr as $key =>$val)
{
if ($_SESSION['CheckMod'] == '1')
{
$arrTitle[] .= $val['vod_name'] ;
}elseif ($_SESSION['CheckMod'] == '2')
{
$arrTitle[] .= mb_substr($val['vod_name'],0,$len,'utf-8') ;
}
}
$where = $this->SearchCon($Get) ;
$where["left(vod_name, $len)"] = array('in',$arrTitle) ;
$video_count = $VodModel->where($where)->count('vod_id') ;
$video_page = !empty($_GET['p']) ?intval($_GET['p']) : 1 ;
$pagesize = 1000 ;
$totalPages = ceil($video_count / $pagesize) ;
$video_page = get_maxpage($video_page,$totalPages) ;
$video_url = U('Plus-Check/VideoCheck',array(
'check_sub'=>'ok',
'len'=>urlencode($len),
'cid'=>$Get['cid'],
'p'=>'{!page!}')) ;
$pagelist = '总数'.$video_count .' '.getpage($video_page,$totalPages,5,$video_url,
'1') ;

$_SESSION['video_repurl'] = $video_url .$video_page ;
$video['type'] = !empty($_GET['type']) ?$_GET['type'] : 'vod_name';
$video['order'] = !empty($_GET['order']) ?$_GET['order'] : 'desc';
$order = $video["type"] .' '.$video['order'] ;
$VResult = $VodModel->field('vod_id,vod_name,vod_cid,vod_play,vod_director,vod_year,vod_mcid,vod_area,vod_url,vod_addtime,vod_hits,vod_beijin,vod_zhanti,vod_stars,vod_status,vod_pic')->
where($where)->order($order)->limit($pagesize)->page($video_page)->select() ;
foreach ($VResult as $key =>$val)
{
$VResult[$key]['vod_url'] = ff_data_url('vod',$list[$key]['vod_id'],$list[$key]['vod_cid'],$list[$key]['vod_name'],1,$list[$key]['vod_jumpurl']);
$VResult[$key]['cname'] = getlistname($VResult[$key]['vod_cid']) ;
$VResult[$key]['channelurl'] = UU('/VideoCheck-check_sub-ok',array('cid'=>$VResult[$key]['vod_cid'],'len'=>urlencode($len),),false,false) ;
$VResult[$key]['videourl'] = ff_data_url('vod',$VResult[$key]['vod_id'],$VResult[$key]['vod_cid']) ;
$VResult[$key]['vod_starsarr'] = $this->admin_star_arr($VResult[$key]['vod_stars']) ;
}
return array(
'vresult'=>$VResult,
'pagelist'=>$pagelist,
'len'=>$len,
'order'=>$order,
'cid'=>$Get['cid'],
'keyword'=>$Get['keyword']) ;
}
private function admin_star_arr($stars)
{
for ($i = 1;$i <= 5;$i++)
{
if ($i <= $stars)
{
$ss[$i] = 1 ;
}else
{
$ss[$i] = 0 ;
}
}
return $ss ;
}
private function SearchCon($Get)
{
if ($Get['cid'])
{
if (getlistson($Get['cid']))
{
$where['vod_cid'] = $Get['cid'] ;
}else
{
$where['vod_cid'] = getlistsqlin($Get['cid']) ;
}
}
if ($Get['status'] ||$Get['status'] === '0')
{
$where['vod_status'] = array('eq',intval($Get['status'])) ;
}
if ($Get['keyword'])
{
$search['vod_name'] = array('like','%'.$Get['keyword'] .'%') ;
$search['vod_actor'] = array('like','%'.$Get['keyword'] .'%') ;
$search['vod_director'] = array('like','%'.$Get['keyword'] .'%') ;
$search['_logic'] = 'or';
$where['_complex'] = $search ;
}
return $where ;
}
private function GetParam()
{
$Get = $this->GetReq($_REQUEST,array(
'len'=>'int',
'cid'=>'int',
'status'=>'int',
'keyword'=>'string',
'type'=>'string',
'order'=>'string',
)) ;
$Get['keyword'] = urldecode(trim($Get['keyword'])) ;
return $Get ;
}
private function GetReq($requests,$input)
{
if (!is_array($input) ||!is_array($requests))
{
return array() ;
}
$data = array() ;
foreach ($input as $key =>$type)
{
$item = $requests[$key] ;
if (strtolower($type) == 'trim')
{
$item = trim($item) ;
}elseif (@!settype($item,$type))
{
die('Check the type of the item "'.$key .'" in input array') ;
}
$data[$key] = $item ;
}
return $data ;
}
}

?>
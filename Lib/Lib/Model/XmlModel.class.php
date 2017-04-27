<?php
class XmlModel extends Model {
private $ffdb;
public function __construct(){
$this->ffdb = M('Vod');
}
public function xml_insert($vod,$mustup){
if(empty($vod['vod_name']) ||empty($vod['vod_url'])){
return '影片名称或播放地址为空，不做处理!';
}
$list_mod = M('list');
$arr=$list_mod->where("list_id='{$vod['vod_cid']}'")->field('list_pid')->find();
if($arr['list_pid']=='0'){
$condition=$vod['vod_cid'];
}else{
$condition=$arr['list_pid'];
}
if(!$vod['vod_cid']){
return '未匹配到对应栏目分类，不做处理!';
}
$vod['vod_name'] = ff_xml_vodname($vod['vod_name']);
$vod['vod_actor'] = ff_xml_vodactor($vod['vod_actor']);
$vod['vod_director'] = ff_xml_vodactor($vod['vod_director']);
$vod['vod_name'] = str_replace(array('QMV','HD','BD','DVD','VCD','TS','无水印','经典系列影片','【完结】','【】','[]','()'),'',$vod['vod_name']);
$vod['vod_name'] = str_replace(array('（','[','【','《','『'),'(',$vod['vod_name']);
$vod['vod_name'] = str_replace(array('）',']','】','》','』'),')',$vod['vod_name']);
$vod['vod_name'] = str_replace('！','!',$vod['vod_name']);
$vod['vod_name'] = str_replace('？','?',$vod['vod_name']);
$vod['vod_name'] = str_replace('—','-',$vod['vod_name']);
$vod['vod_name'] = str_replace('－','-',$vod['vod_name']);
$vod['vod_name'] = str_replace(array(' ','+','·','—','－','_',':','：',',','，','(',')'),'',$vod['vod_name']);
$vod['vod_name'] = str_replace('第1部','第一部',$vod['vod_name']);
$vod['vod_name'] = str_replace('第2部','第二部',$vod['vod_name']);
$vod['vod_name'] = str_replace('第3部','第三部',$vod['vod_name']);
$vod['vod_name'] = str_replace('第4部','第四部',$vod['vod_name']);
$vod['vod_name'] = str_replace('第5部','第五部',$vod['vod_name']);
$vod['vod_name'] = str_replace('第6部','第六部',$vod['vod_name']);
$vod['vod_name'] = str_replace('第7部','第七部',$vod['vod_name']);
$vod['vod_name'] = str_replace('第8部','第八部',$vod['vod_name']);
$vod['vod_name'] = str_replace('第9部','第九部',$vod['vod_name']);
$vod['vod_name'] = str_replace('第10部','第十部',$vod['vod_name']);
$vod['vod_name'] = str_replace('第1季','第一季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第2季','第二季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第3季','第三季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第4季','第四季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第5季','第五季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第6季','第六季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第7季','第七季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第8季','第八季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第9季','第九季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第10季','第十季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第11季','第十一季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第12季','第十二季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第13季','第十三季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第14季','第十四季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第15季','第十五季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第16季','第十六季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第17季','第十七季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第18季','第十八季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第19季','第十九季',$vod['vod_name']);
$vod['vod_name'] = str_replace('第20季','第二十季',$vod['vod_name']);
$vod['vod_name'] = str_replace('Ⅰ','1',$vod['vod_name']);
$vod['vod_name'] = str_replace('Ⅱ','2',$vod['vod_name']);
$vod['vod_name'] = str_replace('Ⅲ','3',$vod['vod_name']);
$vod['vod_name'] = str_replace('Ⅳ','4',$vod['vod_name']);
$vod['vod_name'] = str_replace('Ⅴ','5',$vod['vod_name']);
$vod['vod_name'] = str_replace('Ⅵ','6',$vod['vod_name']);
$vod['vod_name'] = str_replace('Ⅶ','7',$vod['vod_name']);
$vod['vod_name'] = str_replace('Ⅷ','8',$vod['vod_name']);
$vod['vod_name'] = str_replace('Ⅸ','9',$vod['vod_name']);
$vod['vod_name'] = str_ireplace('XIII','13',$vod['vod_name']);
$vod['vod_name'] = str_ireplace('XII','12',$vod['vod_name']);
$vod['vod_name'] = str_ireplace('VIII','8',$vod['vod_name']);
$vod['vod_name'] = str_ireplace('VII','7',$vod['vod_name']);
$vod['vod_name'] = str_ireplace('III','3',$vod['vod_name']);
$vod['vod_name'] = str_ireplace('II','2',$vod['vod_name']);
//if($vod['vod_cid']==4){$vod['vod_name']=str_ireplace('2011','',$vod['vod_name']);}
//if($vod['vod_cid']==4){$vod['vod_name']=str_ireplace('2012','',$vod['vod_name']);}
//if($vod['vod_cid']==4){$vod['vod_name']=str_ireplace('2013','',$vod['vod_name']);}
//if($vod['vod_cid']==4){$vod['vod_name']=str_ireplace('2014','',$vod['vod_name']);}
$vod['vod_name'] = str_replace(array('电影版','电视版','合集','全集','上下部','上下集','(上)','(下)','(完)','(全)','完结','(50集全)'),'',$vod['vod_name']);
$vod['vod_name'] = str_replace(array('电视剧','日剧','韩剧','香港剧','国产剧'),'',$vod['vod_name']);
$vod['vod_name'] = str_replace(array('泰国版','日版','日本版','韩国版','韩版','(港)','(台)','中国版','内地版','大陆版','加长版','(新加坡)','新加坡版'),'',$vod['vod_name']);
if(stristr($vod['vod_name'],'宝岛鱼很大')!=false){$vod['vod_cid']=4;echo $vod['vod_cid'];}
$vod['vod_name'] = str_replace('來','来',$vod['vod_name']);
$vod['vod_name'] = str_replace('靈','灵',$vod['vod_name']);
$vod['vod_name'] = str_replace('愛','爱',$vod['vod_name']);
$vod['vod_name'] = str_replace('医龙4','医龙第四季',$vod['vod_name']);
$vod['vod_name'] = str_replace('折翼的天使们1',' 折翼的天使们第一季',$vod['vod_name']);
$vod['vod_name'] = str_replace('折翼的天使们2',' 折翼的天使们第二季',$vod['vod_name']);
$vod['vod_name'] = str_replace('原来是美男/原来是美男啊(日剧)','原来是美男啊日剧',$vod['vod_name']);
$vod['vod_name'] = str_replace('乡村爱情7','乡村爱情圆舞曲',$vod['vod_name']);
$vod['vod_name'] = str_replace('英雄封神榜','封神英雄榜',$vod['vod_name']);
if(stripos($vod['vod_name'],'泰剧')>0){$vod['vod_cid']=25;$vod['vod_name']=str_replace('泰剧','',$vod['vod_name']);}
if(stripos($vod['vod_name'],'泰国版')>0){$vod['vod_cid']=25;$vod['vod_name']=str_replace('泰国版','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'(新加坡)')>0){$vod['vod_cid']=19;$vod['vod_name']=str_replace('(新加坡)','',$vod['vod_name']);}
if(stripos($vod['vod_name'],'短片')>0){$vod['vod_cid']=35;$vod['vod_name']=str_replace('微电影','',$vod['vod_name']);}
if(stripos($vod['vod_name'],'微电影')>0){$vod['vod_cid']=35;$vod['vod_name']=str_replace('微电影','',$vod['vod_name']);}
if($vod['vod_continu']=='0'){
$vod['vod_continu'] = '0';
}
if(stripos($vod['vod_name'],'DVD+BD')>0){$vod['vod_continu']='DVD+BD';$vod['vod_name']=str_ireplace('DVD+BD','',$vod['vod_name']);}
if(stripos($vod['vod_name'],'HD')>0){$vod['vod_continu']='HD高清';$vod['vod_name']=str_ireplace('HD','',$vod['vod_name']);}
if(stripos($vod['vod_name'],'BD')>0){$vod['vod_continu']='BD高清';$vod['vod_name']=str_ireplace('BD','',$vod['vod_name']);}
if(stripos($vod['vod_name'],'DVDScr')>0){$vod['vod_continu']='DVDScr';$vod['vod_name']=str_ireplace('DVDScr','',$vod['vod_name']);}
if(stripos($vod['vod_name'],'DVD')>0){$vod['vod_continu']='DVD';$vod['vod_name']=str_ireplace('DVD','',$vod['vod_name']);}
if(stripos($vod['vod_name'],'VCD')>0){$vod['vod_continu']='DVD';$vod['vod_name']=str_ireplace('VCD','',$vod['vod_name']);}
if(stripos($vod['vod_name'],'Scr')>0){$vod['vod_continu']='清晰版';$vod['vod_name']=str_ireplace('Scr','',$vod['vod_name']);}
if(stripos($vod['vod_name'],'TC')>0){$vod['vod_continu']='清晰版';$vod['vod_name']=str_ireplace('TC','',$vod['vod_name']);}
if(stripos($vod['vod_name'],'TS')>0){$vod['vod_continu']='抢先版';$vod['vod_name']=str_ireplace('TS','',$vod['vod_name']);}
if(stripos($vod['vod_continu'],'TS')>0){$vod['vod_continu']=str_ireplace('TS','抢先版',$vod['vod_continu']);}
if(strpos($vod['vod_name'],'清晰版')>0){$vod['vod_continu']='清晰版';$vod['vod_name']=str_replace('清晰版','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'抢先版')>0){$vod['vod_continu']='抢先版';$vod['vod_name']=str_replace('抢先版','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'高清版')>0){$vod['vod_continu']='高清版';$vod['vod_name']=str_replace('高清版','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'高清')>0){$vod['vod_continu']='高清';$vod['vod_name']=str_replace('高清','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'导演剪辑加长版')>0){$vod['vod_continu']=$vod['vod_continu'].'导演剪辑加长版';$vod['vod_name']=str_replace('导演剪辑加长版','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'导演剪辑版')>0){$vod['vod_continu']=$vod['vod_continu'].'导演剪辑版';$vod['vod_name']=str_replace('导演剪辑版','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'导演加长版')>0){$vod['vod_continu']=$vod['vod_continu'].='导演加长版';$vod['vod_name']=str_replace('导演加长版','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'加长版')>0){$vod['vod_continu']=$vod['vod_continu'].'加长版';$vod['vod_name']=str_replace('加长版','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'国粤语版')>0){$vod['vod_language']='国粤双语';$vod['vod_name']=str_replace('国粤语版','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'三国')<=0&&strpos($vod['vod_name'],'国粤语')>0){$vod['vod_language']='国粤双语';$vod['vod_name']=str_replace('国粤语','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'国语版')>0){$vod['vod_language']='国语';$vod['vod_name']=str_replace('国语版','国语',$vod['vod_name']);}
if(strpos($vod['vod_name'],'国语')>0){$vod['vod_language']='国语';$vod['vod_name']=str_replace('国语','国语',$vod['vod_name']);}
if(strpos($vod['vod_name'],'粤语版')>0){$vod['vod_language']='粤语';$vod['vod_name']=str_replace('粤语版','粤语',$vod['vod_name']);}
if(strpos($vod['vod_name'],'粤语')>0){$vod['vod_language']='粤语';$vod['vod_name']=str_replace('粤语','粤语',$vod['vod_name']);}
if(strpos($vod['vod_name'],'国粤双语')>0){$vod['vod_language']='国粤双语';$vod['vod_name']=str_replace('国粤双语','国粤双语',$vod['vod_name']);}
if(strpos($vod['vod_name'],'国英双语')>0){$vod['vod_language']='国英双语';$vod['vod_name']=str_replace('国英双语','国英双语',$vod['vod_name']);}
if(strpos($vod['vod_name'],'中英双语')>0){$vod['vod_language']='国英双语';$vod['vod_name']=str_replace('中英双语','中英双语',$vod['vod_name']);}
if(strpos($vod['vod_name'],'国日双语')>0){$vod['vod_language']='国日双语';$vod['vod_name']=str_replace('国日双语','国日双语',$vod['vod_name']);}
if(strpos($vod['vod_name'],'双语')>0){$vod['vod_language']='国粤双语';$vod['vod_name']=str_replace('双语','双语',$vod['vod_name']);}
if(strpos($vod['vod_name'],'日语全')>0){$vod['vod_language']='日语';$vod['vod_continu']='全集';$vod['vod_name']=str_replace('日语全','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'预告片')>0){$vod['vod_continu']='预告片';$vod['vod_name']=str_replace('预告片','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'预告')>0){$vod['vod_continu']='预告';$vod['vod_name']=str_replace('预告','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'首发')>0){$vod['vod_continu']='预告片';$vod['vod_name']=str_replace('首发','',$vod['vod_name']);}
if(strpos($vod['vod_name'],'TV版')>0){$vod['vod_name']=str_replace('TV版','',$vod['vod_name']);}
if($vod['vod_continu']==''){
if($vod['vod_title']!=''){
$vod['vod_continu']=$vod['vod_continu'];
$vod['vod_title']=$vod['vod_title'];
}else{
if($vod['vod_cid']>7 &&$vod['vod_cid']<15){
$vod['vod_continu']='DVD';
}else{
$vod['vod_continu']='全集';
}
}
}else{
if($vod['vod_title']!=''){
$vod['vod_continu']=$vod['vod_continu'];
$vod['vod_title']=$vod['vod_title'];
}else{
if($vod['vod_cid']>15 &&$vod['vod_cid']<25){
$vod['vod_continu'] = str_replace(array('完结','全集'),'DVD',$vod['vod_continu']);
}else{
$vod['vod_continu'] = str_replace('完结','全集',$vod['vod_continu']);
}
}
}
if(strpos($vod['vod_url'],'预告')>0 &&$vod['vod_continu']=='首发'){
$vod['vod_continu'] = str_replace('首发','预告片',$vod['vod_continu']);
}
$tmparr = explode("(",$vod['vod_name']);
$tmpnum = str_replace(")","",$tmparr[1]);
if(is_numeric($tmpnum)){
$tmpnum = (int)$tmpnum;
if($tmpnum<=999){$vod['vod_name']=$tmparr[0];}
}
$vod['vod_name'] = str_replace('()','',$vod['vod_name']);
$vod['vod_name'] = str_replace(' ','',$vod['vod_name']);
$tmparr = explode("/",$vod['vod_name']);
$tmpsize = count($tmparr)-1;
if($tmpsize>0){
$mykeyword=' 黄沙武士 一袋女王 沈春华LIFESHOW 西风烈 半路奶爸 天堂执法者 铁甲钢拳 高米迪战士 无耻之徒 吧嗒吧嗒 傲骨贤妻 鸿门宴 90210 妙警贼探 开卷八分钟 破产姐妹 缺宅男女 男与女 设计人生 委托人 ';
$mykeyword=$mykeyword.'胖子的爱情 短腿的反击 绯闻女孩 美少女的谎言 灵动鬼影实录3 谎言堂 美妙旋律极光之梦 童话镇 爱情男女 旋风腿 ';
$mykeyword=$mykeyword.'但丁01 天降横财 被遗弃的秘密 圣徒秘录 我为喜剧狂 警察世家 律师本色 你猜你猜你猜猜猜 超世纪战神 超市特工 恶魔奶爸 我是传奇 食梦者 天赐有情医 邪恶力量 危机边缘 英雄 战姬绝唱  ';
$mykeyword=$mykeyword.'王贵与安娜 弹火迷情 无界追踪 先生你哪位 香港有个好莱坞 私人诊所 律政俏师太 热带惊雷 记忆神探 爱疯了 憨豆特工2 庸人哈尔 血色浪漫 血色浪漫2 血色浪漫3 格蕾丝的救赎 天赐凯尔 加州靡情 孟菲斯节奏 ';
$mykeyword=$mykeyword.'麻辣警花 无颜美女 风雨哈佛路 欲海医心 一吻定江山 至暗之时 换妻惊魂 我的老板，我的英雄 欧巴桑向前冲 非常小特务 非常小特务2 非常小特务3 神探夏洛克 致命吸引力 老友记 灵异之城 妙女神探 ';
$mykeyword=$mykeyword.'蝎子王3救赎之战 歌舞梦飞扬 剑侠奇缘 the musical 马场风云 猛鬼屋 深海之战 闪点行动 爱在日落之前 火线警告 碟中谍 碟中谍2 碟中谍3 碟中谍4 废柴联盟 丁丁历险记独角兽号的秘密 超给力特工 港湾 禁区 ';
$mykeyword=$mykeyword.'新生六居客 死神来了 死神来了2 死神来了3 死神来了4 死神来了5 十三号仓库 囧男窘事 大器晚成 幽冥怪谈 我恨我的坏女儿 爱情守望记 暮光之城4破晓 空中监狱 boss2 替身老爸 霹雳娇娃 朋友也上床 无限斯特拉托斯 ';
$mykeyword=$mykeyword.'美国女子摔角 荃加福禄寿探案 蓝天使者 热力克利夫兰 我欲为人 囧女珍娜 查莉成长日记 辣女队医 以法之名 恋爱法则 犬友笑传 金装律师 爱情红绿灯 熟女当道 二分之一次同床 汉娜蒙塔娜 神秘博士 钢铁侠 钢铁侠2 宝贝乐一通 相棒 ';
$mykeyword=$mykeyword.'狂野角斗士2011 小律师有大作为 都市急救线 黑衣人 黑衣人2 黑衣人3 合约阶梯大赛 真假学园 真假学园2 重回昨日 女巫季节 欲蛇 幽灵公主 黑之契约者 读心人 夜魔侠 左右不逢源 超感警探 地狱猫 尼基塔 阿凡达 ';
$mykeyword=$mykeyword.'兄弟姐妹 底特律重案组 电锯惊魂 电锯惊魂2 电锯惊魂3 电锯惊魂4 电锯惊魂5 电锯惊魂6 电锯惊魂7 电锯惊魂8 美国之声 邻家女特工 人类星球 阿尔法战士 少狼 纽约22警局 摩登家庭 嗜血法医 梅林传奇 天桥风云 屌丝女 南城警事 阳光照我心 ';
if(strpos($vod['vod_name'],'第')>0 &&strpos($vod['vod_name'],'季')>0){
$myjidu1=explode("第",$vod['vod_name']);
$mysize1=count($myjidu1)-1;
$mystr2tmp=$myjidu1[$mysize1];
$myjidu2=explode("季",$mystr2tmp);
$mystr2="第".$myjidu2[0]."季";
$mystr1=str_replace($mystr2,'',$vod['vod_name']);
$myarr=explode("/",$mystr1);
$myarrlen=count($myarr)-1;
$mykey='';
for($ii=0;$ii<=$myarrlen;$ii++){
if(strpos($mykeyword,$myarr[$ii]." ")===false){
}else{
$mykey=$myarr[$ii];
break;
}
if($ii==$myarrlen){
$mylongname=$mylongname.$myarr[$ii].$mystr2;
}else{
$mylongname=$mylongname.$myarr[$ii].$mystr2."/";
}
}
if($mykey!=''){
$vod['vod_name']=$mykey.$mystr2;
}else{
$vod['vod_name']=$mylongname;
}
}else{
for($jj=0;$jj<=$tmpsize;$jj++){
if(strpos($mykeyword,$tmparr[$jj])>0){
$vod['vod_name']=$tmparr[$jj];
break;
}
}
}
}
if($vod['vod_year'] <200){
$vod['vod_year'] = $vod['vod_year']."0";
}
$array = $this->ffdb->field('vod_id,vod_name,vod_inputer,vod_play,vod_url')->where('vod_reurl="'.$vod['vod_reurl'].'"')->find();
if($array){
return $this->xml_update($vod,$array,$mustup);
}
$inamearr = explode("/",$vod['vod_name']);
for($ix=0;$ix<count($inamearr);$ix++){
$liketitle = $inamearr[$ix];
if($vod['vod_cid']>7 &&$vod['vod_cid']<15){
$where = "(vod_name = '".$liketitle."' or vod_name like '".$liketitle."/%' or vod_name like '%/".$liketitle."/%' or vod_name like '%/".$liketitle."') and (vod_cid>7 and vod_cid<15) order by vod_addtime desc ";
}else{
$where = "(vod_name = '".$liketitle."' or vod_name like '".$liketitle."/%' or vod_name like '%/".$liketitle."/%' or vod_name like '%/".$liketitle."') and vod_cid = ".$vod['vod_cid']." order by vod_addtime desc ";
}
$array = $this->ffdb->field('vod_id,vod_name,vod_actor,vod_title,vod_inputer,vod_play,vod_url')->where($where)->find();
if($array){
if(empty($vod['vod_actor']) ||($array['vod_actor'] == $vod['vodactor'])){
return $this->xml_update($vod,$array,$mustup);
}
return $this->xml_update($vod,$array,$mustup);
}
}
if(C('play_collect_name')){
}
if(strpos($vod['vod_name'],'/')>0){
$vod['vod_status'] = -1;
}
//if($vod['vod_inputer']!='xml_44'){       //我选的主资源站kuaicj.com的id  
//return '未找到匹配，跳过';
//}
unset($vod['vod_id']);
$img = D('Img');
$vod['vod_pic'] = $img->down_load($vod['vod_pic']);
$vod['vod_gold']    = mt_rand(1,C('rand_gold'));
$vod['vod_golder']  = mt_rand(1,C('rand_golder'));
$vod['vod_up']      = mt_rand(1,C('rand_updown'));
$vod['vod_down']    = mt_rand(1,C('rand_updown'));
$vod['vod_hits']    = mt_rand(0,C('rand_hits'));
$vod['vod_zhanti']    = mt_rand(0,C('rand_zhanti'));
$vod['vod_beijin']    = mt_rand(0,C('rand_beijin'));
$vod['vod_letter'] = ff_letter_first($vod['vod_name']);
if(C('play_collect')){
$vod['vod_content'] = ff_rand_str($vod['vod_content']);
}
$vod['vod_stars'] = 1;
$vod['vod_addtime'] = time();
$mcat = M('mcat');
$tagArr = array();
$tag = array_unique(explode(',',trim($vod['vod_keywords'])));
foreach($tag as $k=>$v){
$mcid=$mcat->where("m_name='{$v}' and m_list_id='{$condition}'")->getField('m_cid');
if(!empty($mcid)){
$tagArr[]=$mcid;
}
}
$vod_mcid= implode(',',$tagArr);
$vod['vod_mcid'] = $vod_mcid;
$id = $this->ffdb->data($vod)->add();
if( $vod['vod_keywords'] ){
$data = array();
$data['tag_id'] = $id;
$data['tag_sid'] = 1;
$rstag = M("Tag");
$rstag->where($data)->delete();
$tags = array_unique(explode(',',trim($vod['vod_keywords'])));
foreach($tags as $key=>$val){
$data['tag_name'] = $val;
$rstag->data($data)->add();
}
}
if($id){
return '添加成功('.$id.')。';
}
return '添加失败。';
}
public function xml_update($vod,$vod_old,$mustup=false){
if('ppvod'== $vod_old['vod_inputer']){
return '站长手动设置，不更新。';
}
$edit = array();
if( $mustup ){
$img = D('Img');
$edit['vod_pic'] = $img->down_load($vod['vod_pic']);
//$edit['vod_actor'] = $vod['vod_actor'];
//$edit['vod_director'] = $vod['vod_director'];
//$edit['vod_diantai'] = $vod['vod_diantai'];
//$edit['vod_tvcont'] = $vod['vod_tvcont'];
//$edit['vod_prty'] = $vod['vod_prty'];
$edit['vod_area'] = $vod['vod_area'];
$edit['vod_language'] = $vod['vod_language'];
//$edit['vod_total'] = $vod['vod_total'];
//$edit['vod_isend'] = $vod['vod_isend'];
//$edit['vod_isfilm'] = $vod['vod_isfilm'];
//$edit['vod_filmtime'] = $vod['vod_filmtime'];
}else{
if($vod['vod_area']){$edit['vod_area'] = $vod['vod_area'];}
if($vod['vod_year']){$edit['vod_year'] = $vod['vod_year'];}
if($vod['vod_language']){$edit['vod_language'] = $vod['vod_language'];}
//if($vod['vod_total']){$edit['vod_total'] = $vod['vod_total'];}
//if($vod['vod_isend']){$edit['vod_isend'] = $vod['vod_isend'];}
//if($vod['vod_isfilm']){$edit['vod_isfilm'] = $vod['vod_isfilm'];}
//if($vod['vod_filmtime']){$edit['vod_filmtime'] = $vod['vod_filmtime'];}
}
$array_play_old = explode('$$$',$vod_old['vod_play']);
$play_key = array_search($vod['vod_play'],$array_play_old);
if($play_key !== false){
$array_url_old = explode('$$$',$vod_old['vod_url']);
$vod_old['vod_url_key_old'] = $array_url_old[$play_key];
$vod_old['vod_url_key_new'] = $this->xml_update_urlone($vod_old['vod_url_key_old'],$vod['vod_url']);
if($vod_old['vod_url_key_old'] == $vod_old['vod_url_key_new']){
return strtoupper($vod['vod_play']).' 对应的地址未变化，不更新。';
}else{
$array_url_old[$play_key] = $vod_old['vod_url_key_new'];
$edit['vod_url'] = implode('$$$',$array_url_old);
$edit['vod_update_info'] = strtoupper($vod['vod_play']).' 对应更新。';
$specialStatus = 'update';
}
}else{
$edit['vod_play'] = $vod_old['vod_play'].'$$$'.$vod['vod_play'];
$edit['vod_url'] = trim($vod_old['vod_url']).'$$$'.$vod['vod_url'];
$edit['vod_update_info'] = strtoupper($vod['vod_play']).' 新添加地址。';
$specialStatus = 'update';
}
$edit['vod_id'] = $vod_old['vod_id'];
$edit['vod_name'] = $vod['vod_name'];
$edit['vod_continu'] = $vod['vod_continu'];
$edit['vod_title'] = $vod['vod_title'];
$edit['vod_inputer'] = $vod['vod_inputer'];
$edit['vod_reurl'] = $vod['vod_reurl'];
$edit['vod_addtime'] = time();
$this->ffdb->data($edit)->save();

$remind = M('remind');
if($specialStatus=='update'){
	//发送邮件通知订阅该影片的用户通知其更新
	$rs = D("Vod");
	$domname = getAppPath();
	$domemail = getemail();
	$domtitle = gettitle();
	$movie = $rs->where("vod_id='{$vod_old['vod_id']}'")->field('vod_name')->find();
	$vodName = $movie['vod_name'];
    $vodPic = $vod['vod_pic'];
	$vodTitle = $vod['vod_title'];
	$url = ff_data_url('vod',$vod_old['vod_id'],$vod['vod_cid'],$vod_old['vod_name'],1);
	$messageTitle = ''.$domtitle.'提醒您<<'.$vodName.'>>已更新'.$vodTitle .'!';
	$sql = "select remind.user_id,remind.vod_time,
			user.iemail,user.username
			from ff_remind as remind
			left join ff_user as user
			on user.userid = remind.user_id
			where remind.vod_id='{$vod_old['vod_id']}' and user.isRemind='1' ";
	$edata = $remind->query($sql);
	foreach($edata as $key=>$val){
		$message = '<tbody><tr><td bgcolor="#f4f4f4" style="padding:0 20px 22px 20px;" valign="top" align="center"><table width="620" height="105" cellspacing="0" cellpadding="0" align="center" style="background-image:url('.$domname.'/Public/user/images/dm_header.png); border-collapse:collapse; text-align:left;"><tbody><tr><td><h1 style="padding:0;margin:0;overflow: hidden;width:205px;height:90px;"><a style="display: block;padding:0;margin:0;overflow: hidden;width:205px;height:90px;text-indent: -9999px;font-size: 0;line-height: 0;" target="_blank" href="'.$domname.'">'.$domtitle.'</a></h1></td></tr></tbody></table><table width="620" cellspacing="0" cellpadding="0" align="center"><tbody><tr><td><ul style="list-style: none;margin:0;padding:0;overflow:hidden;"><li style="width:130px;height:210px;margin:0;overflow:hidden;float:left;margin:11px;"><div style="width:130px;height:210px;margin:0 auto;overflow:hidden;background-image:url('.$domname.'Public/user/images/dm-list.png);text-align:center;"><a style="text-decoration: none;" href='.$domname.''.$url.' target="_blank"><img width="96" height="128" border="0" src='.$domname.''.$vodPic.' style="display:block;margin:0 auto;margin-top:17px;margin-bottom:7px;" /></a><p style="width:130px;height:24px;line-height:24px;overflow:hidden;font-size: 14px;margin:0;padding:0;"><a style="text-decoration: none; color:#e12160;" href='.$domname.''.$url.' target="_blank">'.$vodName.'</a></p><p style="width:130px;height:20px;line-height:20px;overflow:hidden;font-size: 12px;margin:0;padding:0;"><a style="text-decoration: none;color:#999;" href='.$domname.''.$url.' target="_blank">'.$vodTitle.'</a></p></div></li></ul></td></tr></tbody></table><table width="620" cellspacing="0" cellpadding="0" align="center" style="border-collapse:collapse; text-align:left;"><tbody><tr><td><div style="border-top:1px solid #dddddd;text-align:left;margin-top:20px;font-size:12px;font-family:Arial, Helvetica, sans-serif;padding:15px;line-height:22px;">尊敬的<strong>'.$val['username'].'</strong>用户您好！您在'.$domtitle.'订阅的影视已经更新，请点击链接进行观看最新更新影视<br />本邮件由订阅系统发出，请勿直接回复。<br /><span style="color: #080">请把&nbsp;&nbsp;<a style="color: #e12160" href="mailto:'.$domemail.'" target="_blank">'.$domemail.'</a>&nbsp;&nbsp;加到您的邮箱联系人中，以确保正确接收订阅更新通知。</span><br />您可随时取消订阅&nbsp;&nbsp;&nbsp;&nbsp;<a style="color: #e12160" href="'.$domname.'index.php?s=User-Center-remindset" target="_blank">取消订阅</a></div></td></tr></tbody></table></td></tr></tbody></table>';
		quickSendMail($val['iemail'],$messageTitle,$message);
	}
}

if(C('data_cache_vod')){
S('data_cache_vod_'.$vod_old['vod_id'],NULL);
}
return $edit['vod_update_info'];
}
public function xml_update_urlone($vodurlold,$vodurlnew){
$arrayold = explode(chr(13),trim($vodurlold));
$arraynew = explode(chr(13),trim($vodurlnew));
foreach($arraynew as $key=>$value){
unset($arrayold[$key]);
}
if($arrayold){
return implode(chr(13),array_merge($arraynew,$arrayold));
}else{
return implode(chr(13),$arraynew);
}
}
}
?>
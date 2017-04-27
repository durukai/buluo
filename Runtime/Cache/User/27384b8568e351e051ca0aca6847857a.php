<?php if (!defined('THINK_PATH')) exit();?>﻿<?php

$path=C('site_path');

if(C('url_rewrite')){

$useurl= C('site_path');

}

else{

$useurl="$path?s=";

}

?>

<?php if(empty($username)): ?><ul class="eb-headnav-ucenter" id="sign" >
<li  id="loginbarx" class="ucenter-wrap ucenter-my drop-down"><a class="nav-link" id="innermsg" href="/?s=user-center-login.html"><span class="ucenter-item js-my">会员中心</span></a>

    

 


<?php else: ?>

<a class="nav-link drop-title nav-avatar" href="<?php echo $useurl; ?>User-Center"><img src="<?php echo ($avatar); ?>?rand=<?php echo time();?>" title="<?php echo ($nickname); ?>" onerror="this.src='__ROOT__Public/user/images/noavatar_small.gif'"> <span><?php echo ($nickname); ?></span></a>

      <div class="drop-box" id="nav-signed" style="display: none;"><ul class="ui-signed">

			<?php if(is_array($menus)): $i = 0; $__LIST__ = $menus;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): ++$i;$mod = ($i % 2 )?><li>

					<a href="<?php echo $useurl; ?><?php echo ($menu["m"]); ?>-<?php echo ($menu["c"]); ?><?php if(!empty($menu["a"])): ?>-<?php echo ($menu["a"]); ?><?php endif; ?>"><i class="ui-icon user-<?php echo ($menu["data"]); ?>"></i><?php echo ($menu["name"]); ?></a>

				</li><?php endforeach; endif; else: echo "" ;endif; ?>

		</ul>

	</div><?php endif; ?>
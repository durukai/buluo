<?php if (!defined('THINK_PATH')) exit();?><select name="cid" id="cid">
<?php if(is_array($vod_list)): $i = 0; $__LIST__ = $vod_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ppvod): ++$i;$mod = ($i % 2 )?><option value="<?php echo ($ppvod["list_id"]); ?>" <?php if(($ppvod["list_id"])  ==  $vod_cid): ?>selected<?php endif; ?>><?php echo ($ppvod["list_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
<option value="">取消绑定</option>
</select>
<input class="submit" type="button" value="提 交" onClick="submitbind($('#cid').val(),'<?php echo $_GET["bind"];?>');" style="cursor:pointer"> <input name="button" type="button" value="取 消" class="submit" onClick="hidebind();" style="cursor:pointer">
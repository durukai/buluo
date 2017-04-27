<?php
class MyAction extends BaseAction{
	// 批量审核　BY QQ:401421567
    public function statusall(){
		if(empty($_POST['ids'])){
			$this->error('请选择需要审核的影片！');
		}
		$rs = D("Vod");
		$array = $_POST['ids'];
		foreach($array as $val){
			$where['vod_id'] = $val;
			$rs->where($where)->setField('vod_status',1);
		}
		redirect('?s=Admin-Vod-Show-status-3');
    }
}
?>
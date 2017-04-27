<?php
/**
 * Cat 模型类
 * by 止步 
 */
class McatModel extends AdvModel
{
	//自动验证
	protected $_validate=array(
		array('m_order','number','排序ID必须为数字',1),
		array('m_name','require','分类名称错误',1),
	);
	
	public function list_cat($list_id)
	{
		$pp_list = M('List')->where("list_id = {$list_id}")->field("list_pid")->find();
		if($pp_list && $pp_list['list_pid'] > 0){
			$list_id = $pp_list['list_pid'];
		}
		return $this->where("m_list_id = {$list_id}")->order("m_order desc")->findAll();
	}
}

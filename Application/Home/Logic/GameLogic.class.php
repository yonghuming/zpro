<?php 
namespace Home\Logic;
use Think\Model;

#虚拟模型与模型分层的异同
class GameLogic extends Model{
	#新建运动会项目某个单位id
	#新建运动会要判断用户的权限
	#利用rabc规则进行判断
	#难道不是通过主键吗
	public function addGame($org_id){
		#判断用户权限
		$form = D('Game');
		#充分利用自动完成简化操作
		#查询没得办法
		#错误信息
		$rules = array(
			array('org_id',$org_id),
			);
		$form->auto($rules)->create();
		$form->add();

	}
	public function updateGame($game_id){

	}
	public function deleteGame($game_id){

	}
}
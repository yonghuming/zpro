<?php 
namespace Home\Controller;
use Think\Controller;
use Home\Logic\GameLogic;

class GameController extends Controller{
	public function insert(){
		#权限判断应该放到logic层？
		#权限与判断放到哪里？

		$data['game_name'] = I('post.game_name');
		print_r(I('post.game_name'));
		$game = D('Game','Logic');
		$game->addGame(222);
		
#
	}
}
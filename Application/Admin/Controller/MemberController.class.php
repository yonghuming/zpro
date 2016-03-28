<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Auth;

class MemberController extends Controller {

	public function login(){
		if(!IS_POST){
			$this->display();
		}else{
			$login = D('Member');

			if(!$data = $login->create()){
				$this->error($login->getError());
			}

			$where = array();

			$where['username'] = $data['username'];

			$result = $login->where($where) -> field('uid,username,passwd') -> find();
			$auth = new Auth();

			if(!$auth->check('shenhe',$result['uid'])){
			    $this->error('没有权限');
			}


			if($result && $result['passwd'] == md5($data['passwd'])){
				session('admin-uid',$result['uid']);
				session('admin-username',$result['username']);

				$ssss['last_login']=date('Y:m:d H:i:s');
				$login->where('uid='.$result['uid'])->save($ssss);

			    $this->success('Login successed!', U('Index/index'));


			}else{
				#var_dump($result);
				#var_dump(md5("02121026"));
				$this->error('密码错误');
			}
		}

	}
	public function logout(){
		session(null);
		redirect(U('Member/login'));

	}

}

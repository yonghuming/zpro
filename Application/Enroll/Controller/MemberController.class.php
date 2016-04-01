?php
namespace Enroll\Controller;
use Think\Controller;
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
		
            var_dump($data);
            var_dump($data['passwd']);
            
			if($result && $result['passwd'] == md5($data['passwd'])){
				session('uid',$result['uid']);
				session('username',$result['username']);
				
				$ssss['last_login']=date('Y:m:d H:i:s');
				$login->where('uid='.$result['uid'])->save($ssss);

				$this->success('登陆成功，正在跳转到选课界面...', U('Index/index'));
				

			}else{
				#var_dump($result);
				#var_dump(md5("02121026"));
				$this->error('登录失败,用户名或密码不正确!');
			}
		}
		
	}
	public function logout(){
		session(null);
		redirect(U('Member/login'));
		
	}

}

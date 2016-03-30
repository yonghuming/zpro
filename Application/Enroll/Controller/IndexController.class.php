<?php
namespace Enroll\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _initialize(){
         
        if (!isset(session('enrolluid'))){
            echo 'hello world';
         #   exit('has session');
            trace($_SESSION);
            $this->error('请先登录',U('Login/login'),10000);
            
        }else{
            trace($_SESSION);
            $this->success('ss',U('Index/index'),10);
        }
     
    }
    public function ld(){
        $this->display();
    }
    public function index(){
      
        #逻辑上是，从members用户表读取用户名和手机号mobile来填充到报名表
        $enroll = D('members');
        $result = $enroll->where('id = '.$_SESSION['enrolluid'])->find();
        trace($_SESSION['enrolluid']);
        trace($result['contact_number1']);
        
        
        $this->assign('username',$_SESSION['enroll']['username']);
        $this->assign('contact_number1',$result['mobile']);
       
       $this->display();
    }
    public function enroll(){
        trace(var_dump($_POST));
        if(!IS_POST){
            $this->error();
        }else{
            $enroll = D('enroll');
            if($enroll->create()){
                $enroll->uid = $_SESSION['enrolluid'];
                $enroll->add();
                $this->success('恭喜您，报名成功',U('Index/index'));
            }else{
                $this->error($enroll->getError());
            }
        }
    }
}
<?php
namespace Enroll\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _initialize(){
         
        if (!isset($_SESSION['enroll']['uid'])){
            $this->error('请先登录',U('Login/login'));
        }
    }
    public function ld(){
        $this->display();
    }
    public function index(){
        $enroll = D('enroll');
        $result = $enroll->where('uid = 1463')->find();
        trace($_SESSION['enroll']['uid']);
        trace($result['contact_number1']);
        
        
        $this->assign('username',$_SESSION['enroll']['username']);
        $this->assign('contact_number1',$result['contact_number1']);
       
       $this->display();
    }
    public function enroll(){
        trace(var_dump($_POST));
        if(!IS_POST){
            $this->error();
        }else{
            $enroll = D('enroll');
            if($enroll->create()){
                $enroll->add();
                $this->success('恭喜您，报名成功',U('Index/index'));
            }else{
                $this->error($enroll->getError());
            }
        }
    }
}
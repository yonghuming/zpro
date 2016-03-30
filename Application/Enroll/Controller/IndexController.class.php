<?php
namespace Enroll\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function _initialize(){
         
        if (!isset($_SESSION['uisd'])){
            $this->error('请先登录',U('Login/login'));
        }
    }
    public function index(){
       
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
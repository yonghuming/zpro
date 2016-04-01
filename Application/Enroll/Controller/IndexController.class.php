<?php
namespace Enroll\Controller;

use Think\Controller;

class IndexController extends Controller
{

    public function _initialize()
    {

        if (null == session('enrolluid')) {
            
            $this->error('请先登录', U('Login/login'));
        }
    }
    public function upload_pic(){
        $pic_url = D('enroll')->where('uid = '.session('enrolluid'))->getField('pic_url');
        if($pic_url){
            $this->assign('pic_url',$pic_url);
        }
        $this->display();
    }
    public function print_enroll(){
        $this->display();
    }
    /**
        判断有无权限
        判断是否可以编辑
    */
    public function edit(){
        $enroll = D('enroll');
            $result = $enroll->where('uid = ' . $_SESSION['enrolluid'])->find();
           
           #如果是报名了，显示报名表
           #如果没有报名，提示报名

            if ($result && $result['id_number'] != null) {
                 $this->assign('enrolled',1);
                foreach ($result as $k => $v) {
                    trace($k.'=>'.$v);
                    $this->assign("$k", $v);

                }                
                    $this->display();
            }else{
                    $this->display();
                    
                }
        
    }
    public function upload(){
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize   =     3145728 ;// 设置附件上传大小
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型
        $upload->rootPath  =     './Uploads/'; // 设置附件上传根目录
        $upload->savePath  =     ''; // 设置附件上传（子）目录
        // 上传文件
        $info   =   $upload->upload();
      
        if(!$info) {// 上传错误提示错误信息
            $this->error($upload->getError());
        }else{// 上传成功
            $enroll = D('enroll');
           
            #$pic_url = $upload->savePath.$info[0]['savename'];
            $pic_url = $upload->rootPath.date('Y-m-d').'/'.$info['pic_url']['savename'];
           
            $this->assign('pic_url',$pic_url);
            $data['pic_url'] = $pic_url;
           
            $enroll->where('uid = '.session('enrolluid'))->save($data);
            
            $this->success('上传成功！','',1);
        }
    }
    public function index()
    {
        
        if (! IS_POST) {
            
            // 将所有字段读出并放到表格里
            $enroll = D('enroll');
            $result = $enroll->where('uid = ' . $_SESSION['enrolluid'])->find();
           trace($_SESSION['enrolluid']);
           #如果是报名了，显示报名表
           #如果没有报名，提示报名

            if ($result && $result['id_number'] != null) {
                 $this->assign('enrolled',1);
                foreach ($result as $k => $v) {
                    trace($k.'=>'.$v);
                    $this->assign("$k", $v);
                    
                    

                }                
                    $this->display();
            }else{
                    $this->display();
                    
                }
            
            // 不是提交，显示
            
        } else {
          
                $enroll = D('members');
                $result = $enroll->where('id = ' . $_SESSION['enrolluid'])->find();
                // 还差个人荣誉
                
                $this->assign('username', $_SESSION['enrollusername']);
                $this->assign('contact_number1', $result['mobile']);
           
            // 逻辑上是，从members用户表读取用户名和手机号mobile来填充到报名表
           
              
           $this->display();
        }
    }

    public function enroll()
    {
        
        if (! IS_POST) {
            $this->error();
        } else {
            $enroll = D('enroll'); 
            if ($enroll->create()) {
                $enroll->uid = $_SESSION['enrolluid'];
                $enroll->add();
                trace($_POST);
                $this->success('恭喜您，报名成功', U('Index/index'),100);
            } else {
                $this->error($enroll->getError());
            }
        }
    }
    public function update(){
        if (! IS_POST) {
            $this->error();
        } else {
            $enroll = D('enroll'); 
            if ($enroll->create()) {
                $uid  = $_SESSION['enrolluid'];
                $enroll->where('uid = '.$uid)->save();
                $this->success('修改报名信息成功', U('Index/index'));
            } else {
                $this->error($enroll->getError());
            }
        }
    }
}
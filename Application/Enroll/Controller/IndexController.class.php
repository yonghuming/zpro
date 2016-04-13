<?php
namespace Enroll\Controller;

use Think\Controller;
use Think\Auth;

/**
 * @author langx
 *
 */
class IndexController extends Controller
{

    public function _initialize()
    {
       
        
//         if (strtotime(date('Y-m-d H:i')) < strtotime('2016-4-14 06:30')) {
//             $this->display('early');
//             exit();
//         }
//         if (strtotime(date('Y-m-d H:i')) > strtotime('2016-4-15 16:30')) {
//             $this->display('early');
//             exit();
//         }
        
        
        if (null == session('enrolluid')) {
            
            $this->error('请先登录', U('Login/login'));
        }
    }
    public function query_score(){
        
    }
    public function check_in()
    {
        $auth = new Auth();
        
        
        if(!$auth->check('confirm',session('enrolluid'))){
            $this->error('没有权限');
        }
       
        if (! IS_POST) {
            $this->display();
        } else {
            
            $id = I('post.query_id');
            
            
            
            $enroll = D('enroll');
            $result = $enroll->where('uid = ' . $id)->find();
             
            
            if ($result && $result['id_number'] != null) {
                $this->assign('enrolled', 1);
                foreach ($result as $k => $v) {
                    trace($k . '=>' . $v);
                    $this->assign("$k", $v);
                }
                trace($result);
                $this->display();
            }else{
                $this->error();
            }
            
           # $this->display();
        }
    }

    public function confirm()
    {
        $this->display('confirm2');
    }
    /**
     * 记录当前共确认多少人
     * 每次打印的 时候自动增加人数，
     * 否则减少人数
     * 
     * 对于修改的人，重新分配序号
     * 
     * 确认，看当前系统有多少人，当前人数加1，作为序号，
     * */
    public function print_info()
    {
            $auth = new Auth();

			if(!$auth->check('confirm',session('enrolluid'))){
			    $this->error('没有权限');
			}
        
            $enroll = D('enroll');
            
            $result = $enroll->where('uid = ' . I('get.id'))->find();
             //重复操作
            $enroll->confirmed = '1';
            $enroll->where('uid = '. I('get.id'))->save();
            
            
            //在报名确认表里添加记录
            //id，报名序号，用户id
            //如果已经有了就不再更改
            $id = I('get.id');
            
            $confirm = D('confirm');
            $confirm_id = $confirm->where('uid = '. $id)->getField('id');
            if(!$confirm_id){
                $data['uid'] = I('get.id');
                $confirm->add($data);
            }
            $confirm_id = $confirm->where('uid = '. $id )->getField('id');
            $this->assign('confirm_id', $this->confirm_id( $confirm_id ) );
            
            
            
            if ($result && $result['id_number'] != null) {
                $this->assign('enrolled', 1);
                foreach ($result as $k => $v) {
                    trace($k . '=>' . $v);
                    $this->assign("$k", $v);
                }
              
                $this->display();
            }else{
                $this->error();
            }
        
            # $this->display();
       
        //生成报名号
        //生成考场信息
       // $this->display();
    }
    public function confirm_id($confirm_id){
        switch ( $confirm_id ) {
            case $confirm_id < 10:
                return '00' . $confirm_id;
                break;
            case $confirm_id < 100 :
                return '0' . $confirm_id;
                break;
            default :
                return  $confirm_id;
                break;
        }
    }

    public function upload_pic()
    {
        $enroll = D('enroll');
        $result = $enroll->where('uid = ' . $_SESSION['enrolluid'])->find();
        if ($result && $result['id_number'] != null) {
            $this->assign('enrolled', 1);
        }
        $pic_url = D('enroll')->where('uid = ' . session('enrolluid'))->getField('pic_url');
        if ($pic_url) {
            $this->assign('pic_url', $pic_url);
        }
        $this->display();
    }

 
    /**
     * 判断有无权限
     * 判断是否可以编辑
     */
    public function edit()
    {
        $enroll = D('enroll');
        $result = $enroll->where('uid = ' . $_SESSION['enrolluid'])->find();
        
        // 如果是报名了，显示报名表
        // 如果没有报名，提示报名
        
        if ($result && $result['id_number'] != null) {
            $this->assign('enrolled', 1);
            foreach ($result as $k => $v) {
                trace($k . '=>' . $v);
                $this->assign("$k", $v);
            }
            $this->display('edit2');
        } else {
            $this->display('insert');
        }
    }

    public function upload()
    {
        $upload = new \Think\Upload(); // 实例化上传类
        $upload->maxSize = 3145728; // 设置附件上传大小
        $upload->exts = array(
            'jpg',
            'gif',
            'png',
            'jpeg'
        ); // 设置附件上传类型
        $upload->rootPath = './Uploads/'; // 设置附件上传根目录
        $upload->savePath = ''; // 设置附件上传（子）目录
                                     // 上传文件
        $info = $upload->upload();
        
        if (! $info) { // 上传错误提示错误信息
            $this->error($upload->getError());
        } else { // 上传成功
            $enroll = D('enroll');
            
            // $pic_url = $upload->savePath.$info[0]['savename'];
            $pic_url = '/Uploads/' . date('Y-m-d') . '/' . $info['pic_url']['savename'];
            
            $this->assign('pic_url', $pic_url);
            $data['pic_url'] = $pic_url;
            
            $enroll->where('uid = ' . session('enrolluid'))->save($data);
            
            $this->success('上传成功！', '', 1);
        }
    }

    public function index()
    {
        trace(date('m'));
        if (! IS_POST) {
            
          
            $enroll = D('enroll');
            $result = $enroll->where('uid = ' . $_SESSION['enrolluid'])->find();
         
            
            if ($result && $result['id_number'] != null) {
                $this->assign('enrolled', 1);
                foreach ($result as $k => $v) {
                    trace($k . '=>' . $v);
                    $this->assign("$k", $v);
                }
                $this->display();
            } else {
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
                $this->success('恭喜您，报名成功', U('Index/index'), 1);
            } else {
                $this->error($enroll->getError());
            }
        }
    }

    public function update()
    {
        if (! IS_POST) {
            $this->error();
        } else {
            $enroll = D('enroll');
            if ($enroll->create()) {
                $uid = $_SESSION['enrolluid'];
                $enroll->where('uid = ' . $uid)->save();
                $this->success('修改报名信息成功', U('Index/index'));
            } else {
                $this->error($enroll->getError());
            }
        }
    }
}
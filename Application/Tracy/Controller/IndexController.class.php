<?php
namespace Tracy\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        trace(session('CURRENT_CLASS'));
        $this->display();
    }
    public function login(){
        $this->display();
    }
    public function admin(){
       
        
        # 设置下拉列表
        $i = 1;
        
        for ( $i = 1; $i < 13; $i++ ){
            $classes['class'.$i] = "高一、".$i."班";
        }
        $this->assign('classes',$classes);
        
       if ( IS_POST ){
           trace(session("CURRENT_CLASS"));
           if ( I('post.username') == 'tracy' && I('post.password') == 'tracy'){
              
               $this->display();
           }else{
               $this->error('密码错误');
           }
       }else{
           trace(session("CURRENT_CLASS"));
           $this->display();
       }
        
    }
    public function lists(){
        $worker = D('worker');
        $lists = $worker->order('id desc')->select();
        
        trace($lists);
        $this->assign('lists',$lists);
        
        $this->display();
    }
    public function setClass(){
        session('CURRENT_CLASS',I('post.class'));
       
        $this->success();
    }
    public function upload(){
        
        if ( IS_POST ) {
           # $worker = D('worker');
            $upload = new \Think\Upload(); // 实例化上传类
            $upload->maxSize = 3145728; // 设置附件上传大小
            $upload->exts = array(
                'swf',
                'fla',
                'jpg',
                'png'

            ); // 设置附件上传类型
            $upload->rootPath = './Uploads/'; // 设置附件上传根目录
            $upload->savePath = ''; // 设置附件上传（子）目录
            $upload->autoSub = true;
            $upload->subName = session('CURRENT_CLASS').'/'.date('Y-m-d');
            // 上传文件
            $info = $upload->upload();
            
            if (! $info) { // 上传错误提示错误信息
                $this->error($upload->getError());
            } else { // 上传成功
                $worker = D('worker');
                # 路径构造错误，缺少文件名部分
                # TODO 修正
                $data['swf_url'] = '/Uploads/' . $info['swf_url']['savepath'].$info['swf_url']['savename'];
                $data['fla_url'] = '/Uploads/' . $info['fla_url']['savepath'].$info['fla_url']['savename'];
                $data['computer_name'] = I('post.computer_name');
                $data['description'] = I('post.description');
                $worker->add($data);
                #ip
                #desc
                
                // $pic_url = $upload->savePath.$info[0]['savename'];
                $pic_url = '/Uploads/' . date('Y-m-d') . '/' . $info['pic_url']['savename'];
            
                $this->assign('pic_url', $pic_url);
                $data['pic_url'] = $pic_url;
            
               # $enroll->where('uid = ' . session('enrolluid'))->save($data);
               # trace($info);
                var_dump($info);
                $this->success('上传成功！', '', 100);
            }
        }
    }
}
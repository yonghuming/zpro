<?php
namespace Admin\Controller;
use Think\Controller;
use Think\Auth;

class IndexController extends Controller {
	public function _initialize(){
       # session(array('expire'=>15));
	    
	    
	   
          if (!isset($_SESSION['admin-username'])){
            $this->error('请先登录',U('Member/login'));
        }
      }
public function agree($id,$id) {
        $kaoqin = M('kaoqin');
        $data['id'] = $id;
        $data['id'] = $id;
        $kaoqin->flag = 1;
        if($kaoqin->where($data)->save()){
          $this->success('sueccess',U('Index/index'));  
        }else{
            $this->error($kaoqin->getError());
        }
    }
    public function disagree($id,$id) {
        $kaoqin = M('kaoqin');
        $data['id'] = $id;
        $data['id'] = $id;
        $kaoqin->flag = 0;
        if($kaoqin->where($data)->save()){
            $this->success('sueccess',U('Index/index'));
        }else{
            $this->error($kaoqin->getError());
        }
    }
    
    public function index(){
        #获取所有申请列表，按照时间顺序
    	$kaoqin = D('kaoqin');
    	$list = $kaoqin->select();
    	$list=$kaoqin->join('think_members ON think_members.id = think_kaoqin.uid','left')->select();
    	$this->assign('list',$list);
    	$this->display();
        #可以支持不同分类视图
    }
}
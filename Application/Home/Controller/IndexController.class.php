<?php


namespace Home\Controller;
#hhh
use Think\Controller;
use Think\Auth;
class IndexController extends Controller {
    public function _initialize(){
       # session(array('expire'=>15));
          if (!isset($_SESSION['username'])){
            $this->error('请先登录',U('Member/login'));
        }
      }
    
    public function apply(){
       
        if(!IS_POST){
            $this->display('teacher');
        }else{
            $kaoqin = D('kaoqin');
        
            $rules = array ( 
                    array('flag','0'),  // 新增的时候把status字段设置为1
              
                   # array('password','md5',3,'function') , // 对password字段在新增和编辑的时候使md5函数处理
                    array('update_time','time',1,'function'), // 对update_time字段在更新的时候写入当前时间戳
                    array('uid',$_SESSION['uid']),
                );
            if(null == I('post.dk_time')){
                $this->error('必须填写未打卡时间');
            }
            if(null == I('post.optionsRadios')){
                $this->error('必须填写是否请假');
            }
            
            if(!$data = $kaoqin->auto($rules)->create()){
                $this->error($kaoqin->getError());
            }
           
            $times = I('post.dk_time');
            foreach($times as $t){
                if($t == 'am'){
                    $kaoqin->am = $t;
                }
                if($t == 'moon'){
                    $kaoqin->moon = $t;
                }
                if($t == 'pm'){
                    $kaoqin->pm = $t;
                }

            }
            #根据session中保存的uid插入数据
            $kaoqin->add();
            $this->success('申请成功等待审核',U('Index/index'));

        }
    }
    public function index($name = 'thinkphp'){
    	if (!isset($_SESSION['username'])){
    		echo "<script>window.location.href='index.php/home/member/login/';</script>";
    	}else{
    		$this->assign('name',$name);
	    	$data = D('Course');
	    	$result = $data -> select();
	    	$this -> assign('result',$result);

            $select_course = M('member_course') -> where('member_id='.$_SESSION['uid'])->getField('course_id');
           // var_dump($select_course);
           # import('ORG.Util.Auth');
            $auth = new Auth();
        
            $grp = $auth->getGroups($_SESSION['uid']);
           // var_dump($grp);
            $this->assign('title',$grp[0]['title']);
          

            if($select_course){
                $this->assign('no_select',"1"); 
                $this->assign('select_course',$select_course); 

           }else{
                $this->assign('no_select',"-1"); 
              #  $this->assign'select_course','False');
           }

           $applies = D('kaoqin');

           $kqlist = $applies->where('flag=1 and uid='.$_SESSION['uid'])->select();
         #  var_dump($kqlist);
           $list = $applies->where('flag=0')->select();
          

                if($grp[0]['title']=='教师'){
                    $this->assign('kqlist',$kqlist);
                    $this->display('teacher');
                }else{
                    $this->display();
                }
			
    	}
    	
       
    }

    
    public function select($id){
       
        $course = D('course');
        $course_id['id'] = $id;
        $result = $course-> where($course_id) -> find();   #根据课程id查找相关信息
        #可以直接写成getField
        #用count函数来统计选课人数
        #如果还可以选择
        if($result['totallimit'] - $result['selected'] >0){
			$class = M('Member')->where($course_id)->getField('class');			
            $s['class'] = $class;            $s['course_id'] = $id;            
            $classlimit =$course->where($course_id)->getField('classlimit');
            $num = M('member_course') ->where($s) -> count();
			#如果classlimit是0，说明不限制
            if ($classlimit && $num >= $classlimit ){
                $this->error('抱歉，你们班级名额已满');
            }
            $select = M('member_course');
           
            
            $data['member_id'] = session('uid');
            $data['course_id'] = $result['id'];       
            $data['class'] = M('member') -> where('uid='.$_SESSION['uid'])->getField('class');
            $data['select_time'] = date('Y-m-d H:i:s');

            M('course')->startTrans();           

            $selectResult = $select->add($data);

            M('course')->where('id='.$id)->setInc('selected');
            $incResult = M('course')->where($course_id)->save();

            if($selectResult){
                $select->commit();
            }else{
                $select->rollback();
            }
            $this->success('恭喜你选课成功',U('Index/index'));
   
          
         }else{
            $this->error('亲，你来晚了，呜哈哈哈哈哈');
         }

    	

    }
    public function unselect($id){
        $diselect['member_id'] = session('uid');
        $diselect['course_id'] = $id;    
        $select = D('course');        
        $select->where('id='.$id)->save();
        $select->startTrans();
        $result = M('member_course')->where($diselect)->delete();
        if($result){
            $select->commit();
            $select->where('id='.$id)->setDec('selected');
            $select->where('id='.$id)->save();
            $this->success('退选成功，请选择其他课程...');
        }else{
           $select->rollback();
           $this->error('退选失败');
        }
    }
    



}

<?php
namespace Home\Model;
use Think\Model;
class KaoqinModel extends Model {
    // 定义自动验证
    protected $_validate = array ( 
    	#增加减少可以自动完成，但是自动完成是在插入成功之后吗？
    	#插入的时候自动完成
    	#删除的时候
    
        array('reason','require','必须填写原因，已请假写请假',Model::MUST_VALIDATE),
        
        
         
         
     );
  

 }

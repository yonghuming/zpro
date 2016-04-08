<?php
namespace Enroll\Model;

use Think\Model;

class EnrollModel extends Model{
    protected function check_length(){
        if (strlen(I('post.student_number')) != 19){
            return false;
        }else{
            return true;
        }
    }
    protected $_validate = array(
       
        

        array('student_number','require','学籍号不能为空'),
        array('student_number','number','学籍号必须是数字'),
       # array('verify', 'verify_check', '验证码错误', 0, 'function'), 
        array('student_number','check_length','学籍号为19位',1,'callback'),

        array('id_number','require','身份证号不能为空'),
        array('id_number','check_identity','身份证格式不正确',1,'callback'),
        
        array('student_name','require','姓名不能为空'),
        array('graduation_school','require','毕业学校不能为空'),
        array('student_duty','require','职务不能为空，没有写无'),
        array('student_sex','require','性别不能为空'),
        array('student_race','require','民族不能为空'),
        array('political_status','require','政治面貌不能为空'),
        array('student_birth','require','生日不能为空'),
        array('zipcode','require','邮政编码不能为空'),
        array('student_address','require','通讯地址不能为空'),
        array('contact_number1','require','联系人1不能为空'),
       # array('contact_number2','require','不能为空'),
       # array('geography_score','require','地理分数不能为空'),
      #  array('geography_score','number','地理分数必须是数字'),
        
        array('geography_level','require','地理级别不能为空'),
       # array('biologic_score','require','生物分数不能为空'),
      #  array('biologic_score','number','生物分数必须是数字'),
        
        array('biologic_level','require','生物级别不能为空'),
        array('it_level','require','信息技术级别不能为空'),
        array('guarder1_name','require','第一监护人不能为空'),
      #  array('guarder2_name','require','不能为空'),
        array('guarder1_tel','require','第一监护人联系方式不能为空'),
      #  array('guarder2_tel','require','不能为空'),
        array('guarder1_address','require','第一监护人地址不能为空'),
        
        array('contact_number1', '/^1[34578]\d{9}$/', '联系人1手机号码格式不正确', 0),
        array('contact_number2', '/^1[34578]\d{9}$/', '联系人2手机号码格式不正确', 0),
        array('guarder1_tel', '/^1[34578]\d{9}$/', '第一监护人手机号码格式不正确', 0),
        
   #     array('guarder2_address','require','不能为空'),
        #array('pic_url','require','不能为空'),
        
    );
    /**
     * 验证18位身份证（计算方式在百度百科有）
     * @param  string $id 身份证
     * return boolean
     */
    function check_identity()
    {
        $id = I('post.id_number');
        $set = array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2);
        $ver = array('1','0','x','9','8','7','6','5','4','3','2');
        $arr = str_split($id);
        $sum = 0;
        for ($i = 0; $i < 17; $i++)
        {
            if (!is_numeric($arr[$i]))
            {
                return false;
            }
            $sum += $arr[$i] * $set[$i];
        }
        $mod = $sum % 11;
        if (strcasecmp($ver[$mod],$arr[17]) != 0)
        {
            return false;
        }
        return true;
    }
}

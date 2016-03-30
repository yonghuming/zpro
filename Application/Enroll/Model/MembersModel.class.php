<?php
/**
 * Created by gaorenhua.
 * User: 597170962 <597170962@qq.com>
 * Date: 2015/6/28
 * Time: 11:25
 */
namespace Enroll\Model;
use Think\Model;

class MembersModel extends Model {
    /**
     * 自动验证
     * self::EXISTS_VALIDATE 或者0 存在字段就验证（默认）
     * self::MUST_VALIDATE 或者1 必须验证
     * self::VALUE_VALIDATE或者2 值不为空的时候验证
     */
    protected $_validate = array(
        
        array('username', 'require', '用户名不能为空！'), //默认情况下用正则进行验证
        array('username', '', '该用户名已被注册！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
        array('username', 'realname'), // 填充真实姓名
        
        array('email', '', '该邮箱已被占用', 0, 'unique', 1), // 新增的时候email字段是否唯一
        array('mobile', '', '该手机号码已被占用', 0, 'unique', 1), // 新增的时候mobile字段是否唯一
        // 正则验证密码 [需包含字母数字以及@*#中的一种,长度为6-22位]
        array('passwd', '/^([a-zA-Z0-9@*#]{6,22})$/', '密码格式不正确,请重新输入！', 0),
        array('repasswd', 'passwd', '确认密码不正确', 0, 'confirm'), // 验证确认密码是否和密码一致
        array('email', 'email', '邮箱格式不正确'), // 内置正则验证邮箱格式
        array('mobile', '/^1[34578]\d{9}$/', '手机号码格式不正确', 0), // 正则表达式验证手机号码
        array('verify', 'verify_check', '验证码错误', 0, 'function'), // 判断验证码是否正确
        //array('agree', 'is_agree', '请先同意网站安全协议！', 1, 'callback'), // 判断是否勾选网站安全协议
        array('agree', 'require', '请先同意网站安全协议！', 1), // 判断是否勾选网站安全协议
    );

    /**
     * 自动完成
     */
    protected $_auto = array (
        array('passwd', 'md5', 3, 'function') , // 对password字段在新增和编辑的时候使md5函数处理
        array('regdate', 'getdate', 1, 'callback'), // 对regdate字段在新增的时候写入当前时间戳
        array('regip', 'getip', 1, 'callback'), // 对regip字段在新增的时候写入当前注册ip地址
        array('last_login', 'gettime', 1, 'function'), // 对regdate字段在新增的时候写入当前时间戳
    );
    protected  function gettime(){
        return date('h:i:s');
    }
    protected  function getdate(){
        return date('y:m:d');
    }
    function getip(){
    global $ip;
    if (getenv("HTTP_CLIENT_IP"))
    $ip = getenv("HTTP_CLIENT_IP");
    else if(getenv("HTTP_X_FORWARDED_FOR"))
    $ip = getenv("HTTP_X_FORWARDED_FOR");
    else if(getenv("REMOTE_ADDR"))
    $ip = getenv("REMOTE_ADDR");
    else $ip = "Unknow";
    return $ip;
    }
    /**
     * 判断是否同意网站安全管理协议
     * @return bool
     */
    protected function is_agree()
    {
        // 获取POST数据
        $agree = I('post.agree', 0, 'intval');

        // 验证
        if ($agree) {
            return true;
        } else {
            return false;
        }
    }
}
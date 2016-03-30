<?php
/**
 * Created by gaorenhua.
 * User: 597170962 <597170962@qq.com>
 * Date: 2015/6/28
 * Time: 0:19
 */

namespace Enroll\Controller;
use Think\Controller;

/**
 * Class LoginController
 * @package Home\Controller
 */
class LoginController extends Controller {
    /**
     * 用户登录
     */
    public function _initialize(){
        layout(false);
       
    }
    public function login()
    {
        
        // 判断提交方式
        if (IS_POST) {
            // 实例化Login对象
            $login = D('login');

            // 自动验证 创建数据集
            if (!$data = $login->create()) {
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                exit($login->getError());
            }

            // 组合查询条件
            $where = array();
            $where['username'] = $data['username'];
            $result = $login->where($where)->field('id,username,realname,passwd,last_login')->find();

            // 验证用户名 对比 密码
            if ($result && $result['passwd'] == $result['passwd']) {
                // 存储session
                session('uid', $result['id']);          // 当前用户id
                session('realname', $result['realname']);   // 当前用户昵称
                session('username', $result['username']);   // 当前用户名
                session('last_login', $result['last_login']);   // 上一次登录时间
                // 上一次登录ip

                // 更新用户登录信息
                $where['userid'] = session('uid');
                #M('users')->where($where)->setInc('loginnum');   // 登录次数加 1
               # M('users')->where($where)->save($data);   // 更新登录时间和登录ip

                $this->success('登录成功,正跳转至系统首页...', U('Index/index'));
            } else {
                $this->error('登录失败,用户名或密码不正确!');
            }
        } else {
            $this->display();
        }
    }

    /**
     * 用户注册
     * 学生注册
     */
    public function register()
    {
        // 判断提交方式 做不同处理
        if (IS_POST) {
        
            $user = D('members');
          
            // 自动验证 创建数据集
//             $rules = array(
                 
//                 array('username', 'require', '用户名不能为空！',1), //默认情况下用正则进行验证
            
//                 // 正则验证密码 [需包含字母数字以及@*#中的一种,长度为6-22位]
//                 array('passwd', '/^([a-zA-Z0-9@*#]{6,22})$/', '密码格式不正确,请重新输入！', 1),
//                 array('repasswd', 'passwd', '确认密码不正确', 1, 'confirm'), // 验证确认密码是否和密码一致
//                 array('email', 'email', '邮箱格式不正确'), // 内置正则验证邮箱格式
//                 array('mobile', '/^1[34578]\d{9}$/', '手机号码格式不正确', 1), // 正则表达式验证手机号码
//                 array('verify', 'verify_check', '验证码错误', 1, 'function'), // 判断验证码是否正确
//                 //array('agree', 'is_agree', '请先同意网站安全协议！', 1, 'callback'), // 判断是否勾选网站安全协议
//                 array('agree', 'require', '请先同意网站安全协议！', 1), // 判断是否勾选网站安全协议
//             );
            #if (!$data = $user->validate($rules)->create()) {
                if (!$data = $user->create()) {
                
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                $this->error($user->getError());//没有返回错误提示
                
            }

            //插入数据库
            trace($_POST);
            if ($id = $user->add()) {
                trace($user->getDBError());
                /* 直接注册用户为学生用户*/
                #注册成功后写用户的权限
                #学生注册成功后为自主招生模块
                #验证访问别的模块的权限
                
                
                $user->where("userid = $id")->setField('companyid', $id);
                $this->success('注册成功', U('Index/index'), 2);
            } else {
                echo 'error'.$user->getError();
                echo $user->getLastSql();
               # $this->error('注册失败');
            }
        } else {
            
            $this->display();
        }
    }

    /**
     * 用户注销
     */
    public function logout()
    {
        // 清楚所有session
        session(null);
        redirect(U('Login/login'), 2, '正在退出登录...');
    }

    /**
     * 验证码
     */
    public function verify()
    {
        // 实例化Verify对象
        $verify = new \Think\Verify();

        // 配置验证码参数
        $verify->fontSize = 14;     // 验证码字体大小
        $verify->length = 4;        // 验证码位数
        $verify->imageH = 34;       // 验证码高度
        $verify->useImgBg = true;   // 开启验证码背景
        $verify->useNoise = false;  // 关闭验证码干扰杂点
        $verify->entry();
    }
}
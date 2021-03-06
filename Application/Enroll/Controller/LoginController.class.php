<?php
/**
 * Created by gaorenhua.
 * User: 597170962 <597170962@qq.com>
 * Date: 2015/6/28
 * Time: 0:19
 */
namespace Enroll\Controller;

use Think\Controller;
use Think\Auth;

/**
 * Class LoginController
 * 
 * @package Home\Controller
 */
class LoginController extends Controller
{

    /**
     * 用户登录
     */
    public function _initialize()
    {
        if (strtotime(date('Y-m-d H:i')) < strtotime('2016-4-14 06:30')) {
            $this->display('early');
            exit();
        }
      /*  if (strtotime(date('Y-m-d H:i')) > strtotime('2016-4-15 16:30')) {
            $this->display('early');
            exit();
        }*/
        layout(false);
    }
    
    public function query()
    {
       
        // 判断提交方式
        if (IS_POST) {
            // 实例化Login对象
            $login = D('Query');
    
            // 自动验证 创建数据集
            if (!$data = $login->create()) {
                // 防止输出中文乱码
                // header("Content-type: text/html; charset=utf-8");
                exit($login->getError());
            }
    
            // 组合查询条件
            $where = array();
            #是否存在是否匹配
            #哈汇文
            #如果存在是否在确认表
            
            $where['id_number'] = $data['id_number'];
            
            $result = $login->where($where)
                        ->field('student_name,uid,id_number,student_number')
                        ->find();
         
            if ($result['id_number'] == '' || $result['student_number'] == ''){
                $this->error('用户不存在');
                
            }
            #是否匹配
            
            // 验证用户名 对比 密码
            trace($data);
            if ($result && $result['student_number'] == $data['student_number']) {
                // 存储session
                session('enrolluid', $result['uid']); // 当前用户id
                session('student_name', $result['student_name']); // 当前用户id
                session('student_number', $result['student_number']); // 当前用户id
                
    
                session('enrollusername', $result['username']); // 当前用户名
                session('last_login', $result['last_login']); // 上一次登录时间
                // 上一次登录ip
                
                // 更新用户登录信息
                trace($_SESSION);
    
                $auth = new Auth();
               
                if(!$auth->check('confirm',session('enrolluid'))){
                    $this->success('登录成功,综合成绩页面...', U('Index/query'),1);
                }else{
                    $this->success('登录成功,正跳转至系统首页...', U('Index/check_in'),1);
                }
    
    
                 
            } else {
                $this->error('身份证和学籍号不匹配!');
            }
        } else {
            $this->display();
        }
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
                // header("Content-type: text/html; charset=utf-8");
                exit($login->getError());
            }
            
            // 组合查询条件
            $where = array();
            $where['username'] = $data['username'];
            $result = $login->where($where)
                ->field('id,username,passwd,last_login')
                ->find();
            
            // 验证用户名 对比 密码
            trace($data);
            if ($result && $result['passwd'] == $data['passwd']) {
                // 存储session
                session('enrolluid', $result['id']); // 当前用户id
                
                session('enrollusername', $result['username']); // 当前用户名
                session('last_login', $result['last_login']); // 上一次登录时间
                                                              // 上一次登录ip
                                                              
                // 更新用户登录信息
                trace($_SESSION);
                
                $auth = new Auth();
                
                if(!$auth->check('confirm',session('enrolluid'))){
                    $this->success('登录成功,正跳转至系统首页...', U('Index/index'),1);
                }else{
                    $this->success('登录成功,正跳转至系统首页...', U('Index/check_in'),1);
                }
                
                
               
            } else {
                $this->error('登录失败,用户名或密码不正确!');
            }
        } else {
            $this->display('login2');
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
            
            if (! $data = $user->create()) {
                
                // 防止输出中文乱码
                header("Content-type: text/html; charset=utf-8");
                $this->error($user->getError()); // 没有返回错误提示
            }
            
            // 插入数据库
            trace($_POST);
            if ($id = $user->add()) {
                
                /* 直接注册用户为学生用户 */
                // 注册成功后写用户的权限
                // 学生注册成功后为自主招生模块
                // 验证访问别的模块的权限
                $group = M('auth_group_access');
                $group->create();
                $group->group_id = 7;
                $group->uid = $id;
                trace($id);
                if (! $group->add()) {
                    header("Content-type: text/html; charset=utf-8");
                    $this->error($user->getError()); // 没有返回错误提示
                }
                
                $this->success('注册成功', U('Index/index'), 2);
            } else {
                echo 'error' . $user->getError();
                echo $user->getLastSql();
                // $this->error('注册失败');
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
        $verify->codeSet = '0123456789'; 
        // 配置验证码参数
       /* $verify->fontSize = 15; // 验证码字体大小
        $verify->length = 4; // 验证码位数
        $verify->imageH = 34; // 验证码高度
        $verify->useImgBg = false; // 开启验证码背景
        $verify->useNoise = true; // 关闭验证码干扰杂点*/
        $verify->useNoise = false;

        $verify->entry();
    }
}
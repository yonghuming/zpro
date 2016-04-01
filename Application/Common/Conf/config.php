<?php
return array(
	//'配置项'=>'配置值'
	'DB_TYPE'=>'mysql',// 数据库类型
	'DB_HOST'=>'127.0.0.1',// 服务器地址
	'DB_NAME'=>'xuanke',// 数据库名
	'DB_USER'=>'root',// 用户名
	'DB_PWD'=>'langxm',// 密码
	'DB_PORT'=>3306,// 端口
	'DB_PREFIX'=>'think_',// 数据库表前缀
	'DB_CHARSET'=>'utf8',// 数据库字符集
	'LAYOUT_ON'=>true,
	'LAYOUT_NAME'=>'layout',
    'AUTH_CONFIG'=>array(
        'AUTH_ON' => true, //认证开关
        'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
        'AUTH_GROUP' => 'think_auth_group', //用户组数据表名
        'AUTH_GROUP_ACCESS' => 'think_auth_group_access', //用户组明细表
        'AUTH_RULE' => 'think_auth_rule', //权限规则表
        'AUTH_USER' => 'think_members'//用户信息表
    ),
	
	#'SHOW_PAGE_TRACE'=>True,
	'SESSION_OPTIONS'         =>  array(
        'name'                => 'BJYSESSION',                    //设置session名
       
       'expire' => 1800,              //SESSION保存15天
     	
       'use_trans_sid'       =>  1,                               //跨页传递
        'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
    ),
);

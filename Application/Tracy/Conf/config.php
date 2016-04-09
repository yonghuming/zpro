<?php
return array(
	//'配置项'=>'配置值'
    'DB_NAME'=>'tracy',// 数据库名
    #'CURRENT_CLASS' => 'class1',
    'SHOW_PAGE_TRACE'=>True,
    'SESSION_OPTIONS'         =>  array(
        'name'                => 'BJYSESSION',                    //设置session名
         
        'expire' => 60 * 60,              //SESSION保存15天
    
        'use_trans_sid'       =>  1,                               //跨页传递
        'use_only_cookies'    =>  0,                               //是否只开启基于cookies的session的会话方式
    ),
);
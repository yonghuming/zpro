<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>信息化平台后台管理</title>

    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">





    <!-- Custom styles for this template -->
    <link href="/zpro/Public/css/jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="/zpro/Public/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>


    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?php echo U('Course/index');?>">QD17信息系统后台</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="<?php echo U('Index/index');?>">首页</a></li>
       
            
            <!-- <li><a href="<?php echo U('Course/add');?>">添加</a></li> -->
            <li><a href="<?php echo U('Member/logout');?>">退出</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>


    <div class="container">

      <div class="starter-template">
        <h1>未打卡登记管理</h1>
        <p class="lead">批准或者驳回教师们的申请.</p>

     
      </div>
	  <div>
	  	<table class="table table-condensed">
			<tr>
				<th>序号</th>
				<th>姓名</th>
				<th>未打卡日期</th>
				<th>未打卡时间</th>
				<th>是否请假</th>
				<th>未打卡原因</th>
				<th>操作</th>
			</tr>
	  		<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
				<td><?php echo ($i); ?></td>
				<td><?php echo ($vo["username"]); ?></td>
				<td><?php echo ($vo["dk_date"]); ?></td>
				
				<td>				
				<?php if(($vo["am"]) == "am"): ?>早上、<?php endif; ?>
				<?php if(($vo["noon"]) == "noon"): ?>中午、<?php endif; ?>
				<?php if(($vo["pm"]) == "pm"): ?>下午<?php endif; ?>
				</td>			
				<td><?php echo ($vo["optionsradios"]); ?></td>
				<td><?php echo ($vo["reason"]); ?></td>
				<td>
					<?php if(($vo["flag"]) == "0"): ?><a href="/zpro/admin.php/Index/agree/id/<?php echo ($vo["id"]); ?>/uid/<?php echo ($vo["uid"]); ?>">批准</a>
					<?php else: ?>
					<a href="/zpro/admin.php/Index/disagree/id/<?php echo ($vo["id"]); ?>/uid/<?php echo ($vo["uid"]); ?>">驳回</a><?php endif; ?>			
					
				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	  </table>

	  </div>
    </div><!-- /.container -->





    <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/zpro/Public/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
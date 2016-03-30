<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/zpro/Public/favorite.ico">

    <title>青岛十七中自主招生报名</title>

    <!-- Bootstrap core CSS -->
    <link href="/zpro/Public/css/bootstrap.min.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="/zpro/Public/css/dashboard.css" rel="stylesheet">

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
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">自主招生报名系统</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="/zpro/enroll.php/Member/index">控制面板</a></li>
            <li><a href="/zpro/enroll.php/Member/index">设置</a></li>
            <li><a href="/zpro/enroll.php/Member/index">个人中心</a></li>
            <li><a href="/zpro/enroll.php/Member/index">帮助</a></li>
          </ul>
          <form class="navbar-form navbar-right">
            <input type="text" class="form-control" placeholder="搜索...">
          </form>
        </div>
      </div>
    </nav>


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
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<div class="container">



	<div class="row col-md-10">
		<div >



			<div class="page-header">
				<h1>青岛十七中自主招生报名系统</h1>
			</div>




			<form action="/zpro/enroll.php/Member/login" method="post" class="form-horizontal">
				<input type='hidden' name='csrfmiddlewaretoken' value='hKaWSl46u2RrGzh9yFHOg2VdJFwL2TdD' />
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
					<div class="col-sm-10">
						<input type="text" name="username" class="form-control" id="inputEmail3" placeholder="请输入姓名">
					</div>
				</div>
				<div class="form-group">
					<label for="inputPassword3"  class="col-sm-2 control-label">密码</label>
					<div class="col-sm-10">
						<input type="password" name='passwd' class="form-control" id="inputPassword3" placeholder="请输入身份证后6位,X要大写">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-default">登录</button>
					</div>
				</div>
			</form>
			
		</div>
	</div>



</div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
   <script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
   <script src="/zpro/Public/js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="/zpro/Public/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/zpro/Public/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
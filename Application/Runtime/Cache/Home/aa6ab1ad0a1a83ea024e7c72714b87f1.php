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

    <title>选修课</title>

    <!-- Bootstrap core CSS -->

<link rel="stylesheet" href="/zpro/Public/css/bootstrap.min.css">





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


<div class="container">
	<div class="row-fluid">
		<div class="span12">

			<nav class="navbar navbar-default">
				<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">未打卡申请</a>
					</div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav">
							<li >
								<a href="#">
									首页
									<span class="sr-only">(current)</span>
								</a>
							</li>

						</ul>

						<ul class="nav navbar-nav navbar-right">

							<li>
								<a href="#">您好，亲爱的<?php echo (session('username')); ?> <?php echo ($title); ?></a>
							</li>
							<li>
								<a href="<?php echo U('Member/logout');?>">退出</a>
							</li>

						</li>
					</ul>
				</div>
				<!-- /.navbar-collapse -->
			</div>
			<!-- /.container-fluid -->
		</nav>

		<div class="row"></div>

	</div>

	<div class="container ">
		<div class="row col-md-6">
			<form method="post" action="/zpro/index.php/Home/Index/apply">		
			<label for="date">未打卡日期</label>
			<div class="form-group">
                <input name='dk_date' id='date' size="16" type="text"  data-date-format="yyyy-mm-dd " value="2016-03-28" readonly class="form_date">
            </div>
			
			<div class="formgroup">
				
				<label>未打卡时间</label>
			<div class="checkbox">
				<label>
					<input name='dk_time[]'  type="checkbox" value="am">
					早上7:30之前
				</label>
			</div>
			<div class="checkbox ">
				<label>
					<input name='dk_time[]' type="checkbox" value="noon" >中午11:30-12:30</label>
			</div>
			<div class="checkbox ">
				<label>
					<input name='dk_time[]' type="checkbox" value="pm" >下午4:45之后</label>
			</div>
			</div>
			<label>是否请假</label>
			<div class="radio">
				<label>
					<input type="radio" name="optionsRadios" id="optionsRadios1" value="已请假" checked>
					已请假
				</label>
			</div>
			<div class="radio">
				<label>
					<input type="radio" name="optionsRadios" id="optionsRadios2" value="未请假">
					未请假
				</label>
			</div>
			<div class="formgroup">
			<label for="reason">理由</label>
			<textarea name='reason' id='reason' class="form-control" rows="3"></textarea>	
			</div>
			
			<button type="submit" class="btn btn-default">申请</button>
		</form>
		</div>
		<div>
			<label>已通过申请列表</label><br>
				<?php if(is_array($kqlist)): $i = 0; $__LIST__ = $kqlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($i); ?> -- <?php echo ($vo["dk_date"]); ?> -- <?php echo ($vo["optionsradios"]); ?> -- <?php echo ($vo["reason"]); ?><br><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>

	</div>
</div>
</div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
	<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>
    <script src="/zpro/Public/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="/zpro/Public/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="/zpro/Public/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/zpro/Public/js/locales/bootstrap-datetimepicker.fr.js" charset="UTF-8"></script>
<script type="text/javascript">
   
	$('.form_date').datetimepicker({
        language:  'zh_CN',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		minView: 2,
		forceParse: 0
    });
	
</script>
  </body>
</html>

<link href="/zpro/Public/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="/zpro/Public/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
<!-- 可选的Bootstrap主题文件（一般不用引入） -->
<link rel="stylesheet" href="/zpro/Public/css/bootstrap-theme.min.css">

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="//cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script>

<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
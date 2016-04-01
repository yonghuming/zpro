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
            <li><a href="/zpro/enroll.php/Index/index">控制面板</a></li>
            <li><a href="/zpro/enroll.php/Index/index">设置</a></li>
            <li><a href="/zpro/enroll.php/Index/index">个人中心</a></li>
            <li><a href="<?php echo U('Login/logout');?>">退出</a></li>
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

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li class="active"><a href="#">报名 <span class="sr-only">(current)</span></a></li>
				<li><a href="/zpro/enroll.php/Index/upload_pic">上传照片</a></li>
				<li><a href="#">打印报名表</a></li>
				<li><a href="#">Export</a></li>
			</ul>

		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">

			<h1 class="page-header">自主招生报名</h1>
			<div class="row">
				<?php if($edit == 0): ?><form class="form-horizontal" action="/zpro/enroll.php/Index/enroll" method="post">

					<div class="form-group col-sm-5">
						<label for="student_number" class="col-sm-3 control-label">学籍号</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="student_number"
								name="student_number" value='<?php echo ($student_number); ?>'
								placeholder="请输入您的学籍号">
						</div>
					</div>
					<!-- 	<div class="form-group col-sm-5">
						<div class="col-sm-2">
							<img src="http://img1.3lian.com/img013/v2/36/d/21.jpg" alt="..." class="img-responsive">
						</div>
					</div> -->
					<div class="form-group col-sm-5">
						<label for="id_number" class="col-sm-3 control-label">身份证号</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="id_number"
								name="id_number" value="<?php echo ($id_number); ?>" placeholder="请输入您的身份证号">
						</div>
					</div>



					<div class="form-group col-sm-5">
						<label for="student_name" class="col-sm-3 control-label">姓名</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="student_name"
								name="student_name" value="<?php echo ($student_name); ?>"
								placeholder="请输入您的姓名">
						</div>
					</div>
					<div class="form-group col-sm-5">
						<label for="student_duty" class="col-sm-3 control-label">在校职务</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="student_duty"
								value="<?php echo ($student_duty); ?>" name="student_duty"
								placeholder="请填写您的在校职务">
						</div>
					</div>


					<div class="form-group col-sm-5">
						<label for="graduation_school" class="col-sm-3 control-label">毕业学校</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="graduation_school"
								name="graduation_school" value='<?php echo ($graduation_school); ?>'>
						</div>
					</div>




					<div class="form-group col-sm-5">
						<label for="student_sex" class="col-sm-3 control-label">性别</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="student_sex"
								name="student_sex" value='<?php echo ($student_sex); ?>'>
						</div>

					</div>

					<div class="form-group col-sm-5">
						<label for="student_race" class="col-sm-3 control-label">民族</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="student_race"
								name="student_race" value='<?php echo ($student_race); ?>'>
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="political_status" class="col-sm-3 control-label">政治面貌</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="political_status"
								name="political_status" value='<?php echo ($political_status); ?>'>
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="student_birth" class="col-sm-3 control-label">出生日期</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="student_birth"
								name="student_birth" placeholder="请选择出生日期">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="zipcode" class="col-sm-3 control-label">邮政编码</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="zipcode"
								name="zipcode" value='<?php echo ($zipcode); ?>' placeholder="请输入邮政编码">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="student_address" class="col-sm-3 control-label">通讯地址</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="student_address"
								name="student_address" value="<?php echo ($student_address); ?>"
								placeholder="请输入通讯地址">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="contact_number1" class="col-sm-3 control-label">联系电话1</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="contact_number1"
								name="contact_number1" value="<?php echo ($contact_number1); ?>"
								placeholder="请输入联系电话1">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="contact_number2" class="col-sm-3 control-label">联系电话2</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="contact_number2"
								name="contact_number2" value="<?php echo ($contact_number1); ?>"
								placeholder="请输入联系电话2">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="geography_score" class="col-sm-3 control-label">地理成绩</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="geography_score"
								name="geography_score" value="<?php echo ($geography_score); ?>"
								placeholder="请输入地理成绩">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="geography_level" class="col-sm-3 control-label">地理等级</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="geography_level"
								name="geography_level" value='<?php echo ($geography_level); ?>'>
						</div>
					</div>



					<div class="form-group col-sm-5">
						<label for="biologic_score" class="col-sm-3 control-label">生物成绩</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="biologic_score"
								name="biologic_score" value="<?php echo ($geography_score); ?>"
								placeholder="请输入生物成绩">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="biologic_level" class="col-sm-3 control-label">生物等级</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="biologic_level"
								name="biologic_level" value='<?php echo ($biologic_level); ?>'>
						</div>
					</div>


					<div class="form-group col-sm-5">
						<label for="it_level" class="col-sm-3 control-label">信息技术等级</label>
						<div class="col-sm-9">
							<input disabled type="text" class="form-control" id="it_level"
								name="it_level" value='<?php echo ($it_level); ?>'>
						</div>
					</div>

					<div class="form-group col-sm-10">
						<table class="table table-responsive">
							<tr>
								<td class="col-sm-2">类别</td>
								<td class="col-sm-2">姓名</td>
								<td class="col-sm-2">联系手机</td>
								<td>工作单位</td>
							</tr>
							<tr>
								<td>第一监护人</td>
								<td><input disabled type="text" class="form-control"
									id="guarder1_name" name="guarder1_name"
									value="<?php echo ($guarder1_name); ?>" placeholder="请输入姓名"></td>
								<td><input disabled type="text" class="form-control"
									id="guarder1_tel" name="guarder1_tel" value="<?php echo ($guarder1_tel); ?>"
									placeholder="请输入手机"></td>
								<td><input disabled type="text" class="form-control"
									id="guarder1_address" name="guarder1_address"
									value='<?php echo ($guarder1_address); ?>' placeholder="请输入单位"></td>
							</tr>
							<tr>
								<td>第二监护人</td>
								<td><input disabled type="text" class="form-control"
									id="guarder2_name" name="guarder2_name"
									value="<?php echo ($guarder2_name); ?>" placeholder="请输入姓名"></td>
								<td><input disabled type="text" class="form-control"
									id="guarder2_tel" name="guarder2_tel" value="<?php echo ($guarder2_tel); ?>"
									placeholder="请输入手机"></td>
								<td><input disabled type="text" class="form-control"
									id="guarder2_address" name="guarder2_address"
									value='<?php echo ($guarder2_address); ?>' placeholder="请输入单位"></td>
							</tr>

						</table>
					</div>
					<div class="form-group col-sm-12">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">修改</button>
						</div>
					</div>




				</form>
				<?php else: ?>
				<form class="form-horizontal" action="/zpro/enroll.php/Index/enroll" method="post">

					<div class="form-group col-sm-5">
						<label for="student_number" class="col-sm-3 control-label">学籍号</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="student_number"
								name="student_number" value='<?php echo ($student_number); ?>'
								placeholder="请输入您的学籍号">
						</div>
					</div>
					<!-- 	<div class="form-group col-sm-5">
						<div class="col-sm-2">
							<img src="http://img1.3lian.com/img013/v2/36/d/21.jpg" alt="..." class="img-responsive">
						</div>
					</div> -->
					<div class="form-group col-sm-5">
						<label for="id_number" class="col-sm-3 control-label">身份证号</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="id_number"
								name="id_number" value="<?php echo ($id_number); ?>" placeholder="请输入您的身份证号">
						</div>
					</div>



					<div class="form-group col-sm-5">
						<label for="student_name" class="col-sm-3 control-label">姓名</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="student_name"
								name="student_name" value="<?php echo ($student_name); ?>"
								placeholder="请输入您的姓名">
						</div>
					</div>
					<div class="form-group col-sm-5">
						<label for="student_duty" class="col-sm-3 control-label">在校职务</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="student_duty"
								value="<?php echo ($student_duty); ?>" name="student_duty"
								placeholder="请填写您的在校职务">
						</div>
					</div>


					<div class="form-group col-sm-5">
						<label for="graduation_school" class="col-sm-3 control-label">毕业学校</label>
						<div class="col-sm-9">
							<select id="province" class="form-control col-sm-1 city"
								name='student_school'>
								<option>----请选择您的毕业学校----</option>
								<option value="	青岛第二十六中学	">青岛第二十六中学</option>
								<option value="	青岛第五十七中学	">青岛第五十七中学</option>
								<option value="	青岛四十八中	">青岛四十八中</option>
								<option value="	青岛四十八中	">青岛四十八中</option>
								<option value="	青岛五十九中	">青岛五十九中</option>
								<option value="	青岛银海学校（初中部）	">青岛银海学校（初中部）</option>
								<option value="	山东省青岛第二十四中学	">山东省青岛第二十四中学</option>
								<option value="	山东省青岛第七中学	">山东省青岛第七中学</option>
								<option value="	山东省青岛第五十一中学	">山东省青岛第五十一中学</option>
								<option value="	山东省青岛第五中学	">山东省青岛第五中学</option>
								<option value="	私立青岛智荣中学	">私立青岛智荣中学</option>
								<option value="	山东省青岛第二十二中学	">山东省青岛第二十二中学</option>
								<option value="	山东省青岛第二十七中学	">山东省青岛第二十七中学</option>
								<option value="	山东省青岛第六十二中学	">山东省青岛第六十二中学</option>
								<option value="	山东省青岛第六十三中学	">山东省青岛第六十三中学</option>
								<option value="	山东省青岛第六十四中学	">山东省青岛第六十四中学</option>
								<option value="	山东省青岛第六十一中学	">山东省青岛第六十一中学</option>
								<option value="	山东省青岛第六十一中学	">山东省青岛第六十一中学</option>
								<option value="	山东省青岛第三十三中学	">山东省青岛第三十三中学</option>
								<option value="	山东省青岛第三十一中学	">山东省青岛第三十一中学</option>
								<option value="	山东省青岛第四十九中学	">山东省青岛第四十九中学</option>
								<option value="	青岛超银中学	">青岛超银中学</option>
								<option value="	青岛超银中学（四方校区）	">青岛超银中学（四方校区）</option>
								<option value="	青岛第二实验初级中学	">青岛第二实验初级中学</option>
								<option value="	青岛启元学校	">青岛启元学校</option>
								<option value="	青岛四十一中	">青岛四十一中</option>
								<option value="	青岛育文中学	">青岛育文中学</option>
								<option value="	山东省青岛第二十八中学	">山东省青岛第二十八中学</option>
								<option value="	山东省青岛第二十三中学	">山东省青岛第二十三中学</option>
								<option value="	山东省青岛第二十一中学	">山东省青岛第二十一中学</option>
								<option value="	山东省青岛第六十五中学	">山东省青岛第六十五中学</option>
								<option value="	山东省青岛第三十四中学	">山东省青岛第三十四中学</option>
								<option value="	山东省青岛第四十七中学	">山东省青岛第四十七中学</option>
								<option value="	山东省青岛第四十四中学	">山东省青岛第四十四中学</option>
								<option value="	山东省青岛第五十六中学	">山东省青岛第五十六中学</option>
								<option value="	山东省青岛第五十三中学	">山东省青岛第五十三中学</option>
								<option value="	山东省青岛第五十中学	">山东省青岛第五十中学</option>

							</select>

						</div>
					</div>




					<div class="form-group col-sm-5">
						<label for="student_sex" class="col-sm-3 control-label">性别</label>
						<div class="col-sm-9">
							<select class="form-control" name='student_sex'>
								<option>请选择您的性别</option>
								<option value='1'>男</option>
								<option value='0'>女</option>
							</select>
						</div>

					</div>

					<div class="form-group col-sm-5">
						<label for="student_race" class="col-sm-3 control-label">民族</label>
						<div class="col-sm-9">
							<select class='form-control' name="student_race"
								id="student_race">
								<option value="汉族">汉族</option>
								<option value="蒙古族">蒙古族</option>
								<option value="彝族">彝族</option>
								<option value="侗族">侗族</option>
								<option value="哈萨克族">哈萨克族</option>
								<option value="畲族">畲族</option>
								<option value="纳西族">纳西族</option>
								<option value="仫佬族">仫佬族</option>
								<option value="仡佬族">仡佬族</option>
								<option value="怒族">怒族</option>
								<option value="保安族">保安族</option>
								<option value="鄂伦春族">鄂伦春族</option>
								<option value="回族">回族</option>
								<option value="壮族">壮族</option>
								<option value="瑶族">瑶族</option>
								<option value="傣族">傣族</option>
								<option value="高山族">高山族</option>
								<option value="景颇族">景颇族</option>
								<option value="羌族">羌族</option>
								<option value="锡伯族">锡伯族</option>
								<option value="乌孜别克族">乌孜别克族</option>
								<option value="裕固族">裕固族</option>
								<option value="赫哲族">赫哲族</option>
								<option value="藏族">藏族</option>
								<option value="布依族">布依族</option>
								<option value="白族">白族</option>
								<option value="黎族">黎族</option>
								<option value="拉祜族">拉祜族</option>
								<option value="柯尔克孜族">柯尔克孜族</option>
								<option value="布朗族">布朗族</option>
								<option value="阿昌族">阿昌族</option>
								<option value="俄罗斯族">俄罗斯族</option>
								<option value="京族">京族</option>
								<option value="门巴族">门巴族</option>
								<option value="维吾尔族">维吾尔族</option>
								<option value="朝鲜族">朝鲜族</option>
								<option value="土家族">土家族</option>
								<option value="傈僳族">傈僳族</option>
								<option value="水族">水族</option>
								<option value="土族">土族</option>
								<option value="撒拉族">撒拉族</option>
								<option value="普米族">普米族</option>
								<option value="鄂温克族">鄂温克族</option>
								<option value="塔塔尔族">塔塔尔族</option>
								<option value="珞巴族">珞巴族</option>
								<option value="苗族">苗族</option>
								<option value="满族">满族</option>
								<option value="哈尼族">哈尼族</option>
								<option value="佤族">佤族</option>
								<option value="东乡族">东乡族</option>
								<option value="达斡尔族">达斡尔族</option>
								<option value="毛南族">毛南族</option>
								<option value="塔吉克族">塔吉克族</option>
								<option value="德昂族">德昂族</option>
								<option value="独龙族">独龙族</option>
								<option value="基诺族">基诺族</option>
							</select>
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="political_status" class="col-sm-3 control-label">政治面貌</label>
						<div class="col-sm-9">
							<select class="form-control" name='political_status'
								placeholder="请选择政治面貌">
								<option>请选择您的政治面貌</option>
								<option value='团员'>团员</option>
								<option value='预备党员'>预备党员</option>
								<option value='党员'>党员</option>
								<option value='未入团'>未入团</option>

							</select>
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="student_birth" class="col-sm-3 control-label">出生日期</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="student_birth"
								name="student_birth" placeholder="请选择出生日期">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="zipcode" class="col-sm-3 control-label">邮政编码</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="zipcode"
								name="zipcode" value='<?php echo ($zipcode); ?>' placeholder="请输入邮政编码">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="student_address" class="col-sm-3 control-label">通讯地址</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="student_address"
								name="student_address" value="<?php echo ($student_address); ?>"
								placeholder="请输入通讯地址">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="contact_number1" class="col-sm-3 control-label">联系电话1</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="contact_number1"
								name="contact_number1" value="<?php echo ($contact_number1); ?>"
								placeholder="请输入联系电话1">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="contact_number2" class="col-sm-3 control-label">联系电话2</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="contact_number2"
								name="contact_number2" value="<?php echo ($contact_number1); ?>"
								placeholder="请输入联系电话2">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="geography_score" class="col-sm-3 control-label">地理成绩</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="geography_score"
								name="geography_score" value="<?php echo ($geography_score); ?>"
								placeholder="请输入地理成绩">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="geography_level" class="col-sm-3 control-label">地理等级</label>
						<div class="col-sm-9">
							<select class="form-control" name='geography_level'
								placeholder="请选择政治面貌">
								<option>请选择您的等级</option>
								<option value='A'>A</option>
								<option value='B'>B</option>

							</select>
						</div>
					</div>



					<div class="form-group col-sm-5">
						<label for="biologic_score" class="col-sm-3 control-label">生物成绩</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="biologic_score"
								name="biologic_score" value="<?php echo ($geography_score); ?>"
								placeholder="请输入生物成绩">
						</div>
					</div>

					<div class="form-group col-sm-5">
						<label for="biologic_level" class="col-sm-3 control-label">生物等级</label>
						<div class="col-sm-9">
							<select class="form-control" name='biologic_level'
								placeholder="请选择政治面貌">
								<option>请选择您的等级</option>
								<option value='A'>A</option>
								<option value='B'>B</option>

							</select>
						</div>
					</div>


					<div class="form-group col-sm-5">
						<label for="it_level" class="col-sm-3 control-label">信息技术等级</label>
						<div class="col-sm-9">
							<select class="form-control" name='it_level'
								placeholder="请选择信息技术等级">
								<option>请选择您的等级</option>

								<option value='及格'>及格</option>
								<option value='不及格'>不及格</option>

							</select>
						</div>
					</div>

					<div class="form-group col-sm-10">
						<table class="table table-responsive">
							<tr>
								<td class="col-sm-2">类别</td>
								<td class="col-sm-2">姓名</td>
								<td class="col-sm-2">联系手机</td>
								<td>工作单位</td>
							</tr>
							<tr>
								<td>第一监护人</td>
								<td><input type="text" class="form-control"
									id="guarder1_name" name="guarder1_name"
									value="<?php echo ($guarder1_name); ?>" placeholder="请输入姓名"></td>
								<td><input type="text" class="form-control"
									id="guarder1_tel" name="guarder1_tel" value="<?php echo ($guarder1_tel); ?>"
									placeholder="请输入手机"></td>
								<td><input type="text" class="form-control"
									id="guarder1_address" name="guarder1_address"
									value='<?php echo ($guarder1_address); ?>' placeholder="请输入单位"></td>
							</tr>
							<tr>
								<td>第二监护人</td>
								<td><input type="text" class="form-control"
									id="guarder2_name" name="guarder2_name"
									value="<?php echo ($guarder2_name); ?>" placeholder="请输入姓名"></td>
								<td><input type="text" class="form-control"
									id="guarder2_tel" name="guarder2_tel" value="<?php echo ($guarder2_tel); ?>"
									placeholder="请输入手机"></td>
								<td><input type="text" class="form-control"
									id="guarder2_address" name="guarder2_address"
									value='<?php echo ($guarder2_address); ?>' placeholder="请输入单位"></td>
							</tr>

						</table>
					</div>
					<div class="form-group col-sm-12">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-default">报名</button>
						</div>
					</div>




				</form><?php endif; ?>

			</div>




		</div>
	</div>
</div>
<script type="text/javascript">

</script>

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
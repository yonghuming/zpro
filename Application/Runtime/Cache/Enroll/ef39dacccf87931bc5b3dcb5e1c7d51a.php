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
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
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
<!DOCTaYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="keywords" content=" keywords" />
    <meta name="description" content="description" />
</head>
<script src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<style type="text/css">
    body{font-size:13px}
    .clsInit{width:435px;height::35px;line-height:35px;padding-left:10px}
    .clsTip{padding-top:5px;background-color:#eee;display:none}
    .btn{border:solid 1px #666;padding:2px;width:65px;float:right;margin-top:6px;margin-right:6px;filter:progid:DXImageTransform.Mcrosoft.Gradient(GraientType=0,StartColorStr=#FFFFFF,EndColorStr=#ECE9D8);}
</style>
<body>
<script type="text/javascript">
var currentShowCity=0;
$(document).ready(function(){
   $("#province").change(function(){
   $("#province option").each(function(i,o){
   if($(this).attr("selected"))
   {
  
   $(".city").hide();
   $(".city").eq(i).show();
   currentShowCity=i;
   }
   });
   });
   $("#province").change();
});
function getSelectValue(){
alert("1级="+$("#province").val());
  
$(".city").each(function(i,o){
                    
 if(i == currentShowCity){
alert("2级="+$(".city").eq(i).val());
 }
   });
}
   
</script>
<select id="province"> 
      <option>----请选择省份----</option> 
       <option>北京</option> 
       <option>上海</option> 
       <option>江苏</option> 
   </select> 
   <select class="city"> 
   <option>----请选择城市----</option> 
   </select> 
   <select class="city"> 
       <option>东城</option> 
       <option>西城</option> 
       <option>崇文</option> 
       <option>宣武</option> 
       <option>朝阳</option> 
   </select>  
   <select class="city"> 
       <option>黄浦</option> 
       <option>卢湾</option> 
       <option>徐汇</option> 
       <option>长宁</option> 
       <option>静安</option> 
   </select> 
   <select class="city"> 
       <option>南京</option> 
       <option>镇江</option> 
       <option>苏州</option> 
       <option>南通</option> 
       <option>扬州</option> 
   </select> 

</body>
</html>

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
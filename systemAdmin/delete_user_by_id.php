<?php
require("../globle.php");//字符组文件
require("../is_login.php");//检查是否登录
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Bootstrap core CSS -->
	<link href="../../css/bootstrap.css" rel="stylesheet">
	<!-- 自定义样式 -->
	<link href="../../css/books.css" rel="stylesheet">
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
				<p1 class="navbar-brand white">LibrarySystem</p1>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#"><?php
					echo $top_nav1; ?></a></li>
					<li><a href="#about"><?php
					echo $top_nav2; ?></a></li>
					<li><a href="#contact"><?php
					echo $top_nav3; ?></a></li>
					<li><a href="#" class="blank"></a></li>
					<li><a href="#"><?php    
					echo $welcome;
					echo $_SESSION['user'];?></a></li>
					<li><a href="../logout.php"><?php
					echo $logout; ?></a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->

		</div>
	</nav>
	<div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li><a href="logined_systemAdmin.php"><?php
			echo $sysAdmin_left_nav1_1; ?></a></li>
			<li><a href="search_user_by_id.php"><?php
			echo $sysAdmin_left_nav1_2; ?></a></li>
			<li><a href="insert_user.php"><?php
			echo $sysAdmin_left_nav1_3; ?></a></li>
			<li class="active"><a href="delete_user_by_id.php"><?php
			echo $sysAdmin_left_nav1_4; ?></a></li>
		</ul>
	</div>

	<div class="container">
		<h1>Delete users</h1>  <br>
		<form class="form-horizontal" role="form" action="delete_user_by_id2.php" name="form" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">User_Id</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="user_Id" placeholder="user_Id"/>
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" name="submit" value="Delete" class="btn btn-primary" />
				</div>
			</div>
		</form>
	</div>

</body>
</html>

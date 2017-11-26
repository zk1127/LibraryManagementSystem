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
				<?php include"../top_nav_common.php"; ?>
			</div>
			<!--/.nav-collapse -->
		</div>
	</nav>
	<div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li><a href="logined_bookAdmin.php"><?php
			echo $bookAdmin_left_nav1_1; ?></a></li>
			<li><a href="search_name2id.php"><?php
			echo $bookAdmin_left_nav1_2; ?></a></li>
			<li><a href="insert_book_api.php"><?php
			echo $bookAdmin_left_nav1_3; ?></a></li>
			<li class="active"><a href="delete_book_by_id.php"><?php
			echo $bookAdmin_left_nav1_4; ?></a></li>
		</ul>
		<?php include"bookAdmin_left_nav_common2.php"; ?>	
		<?php include"bookAdmin_left_nav_common3.php"; ?>	
		<?php include"bookAdmin_left_nav_common4.php"; ?>	
	</div>

	<div class="container">
		<h1>Delete book</h1>  <br>
		<form class="form-horizontal" role="form" action="delete_book_by_id2.php" name="form" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">Book Id</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="book_Id" placeholder="book_Id" autofocus="autofocus" />
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

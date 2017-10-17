<!DOCTYPE html>
<html lang="zh-CN">
<!-- 读者查询界面-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
	<meta name="description" content="">
	<meta name="author" content="">
	<!-- Bootstrap core CSS -->
	<link href="../css/bootstrap.css" rel="stylesheet">
	<!-- 自定义样式 -->
	<link href="../css/reader.css" rel="stylesheet">

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
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="#" class="user">Welcome，<?php    
					session_start();//开启session
					echo $_SESSION['user'] ?></a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->

		</div>
	</nav>
	<div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li class="active"><a href="logined_reader.php">Search <span class="sr-only current"></span></a></li>
			<li><a href="books.php">Display all</a></li>
			<li><a href="records.php">Records</a></li>
			<li><a href="#"></a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="">Nav item</a></li>
			<li><a href="">Nav item again</a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="">Nav item again</a></li>
		</ul>
	</div>

	<div class="container">

		<div class="starter-template   col-md-offset-1">
			<h1>Welcome to our Library System </h1>

		</div>
		<!-- 搜索书目 -->
		
			<div class="row">
			<div class="col-md-offset-3">
				<form action="logined_reader2.php" method="post">
					<div class="input-group">
						<input type="text" name="search" class="form-control input-lg"  placeholder="Search Books… " autofocus>
						<span class="input-group-btn">
							<button class="btn btn-primary btn-lg" type="submit">
								<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
							</button>
						</span>
					</div>
				</form>
			</div>
		</div><!-- row -->






	</div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    	================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->
    	<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
    </html>
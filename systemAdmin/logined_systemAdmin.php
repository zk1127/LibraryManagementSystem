<?php
require("../globle.php");
session_start();//开启session
if(!isset($_SESSION['user']))
{
	echo "<Script>alert('Please login');</Script>";
	echo "<Script>window.location.href='../login.html'</Script>";
}
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
			<li class="active"><a href="logined_systemAdmin.php"><?php
			echo $sysAdmin_left_nav1_1; ?></a></li>
			<li><a href="search_user_by_id.php"><?php
			echo $sysAdmin_left_nav1_2; ?></a></li>
			<li><a href="insert_user.php"><?php
			echo $sysAdmin_left_nav1_3; ?></a></li>
			<li><a href="delete_user_by_id.php"><?php
			echo $sysAdmin_left_nav1_4; ?></a></li>
		</ul>
	</div>
	<div class="container">
		<?php

		$con = mysqli_connect('127.0.0.1','root','','test',3306);
		if (!$con)
		{
			die('Could not connect: ' . mysql_error());
		}

		mysql_select_db('test');

		mysql_query("set names utf8");
		$result = mysql_query("SELECT * FROM users");
		?>


		<div class="books">
			<div class="row">

				<table class="table table-striped">
					<tr>
						<th>id</th>
						<th>name</th>
						<th>role</th>
					</tr>

					<?php
					while($row = mysql_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>" . $row['user_Id'] . "</td>";
						echo "<td>" . $row['user_Name'] . "</td>";
						if($row['role']==0)echo "<td>SystemAdmin</td>";
						else if($row['role']==2)echo "<td>BookAdmin</td>";
						else echo "<td>Reader</td>";


						echo "</tr></div></div>";




					}
					echo "</table>";

					mysqli_close($con);
					?>
				</div>





    <!-- Bootstrap core JavaScript
    	================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->
    	<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
    </html>
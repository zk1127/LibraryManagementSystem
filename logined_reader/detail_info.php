<?php
require("../globle.php");//字符组文件
require("../is_login.php");//检查是否登录
require("../MySqlUtils.php");  
$book_Name=$_POST["book_Name"];
?>
<!DOCTYPE html>
<html lang="zh-CN">
<!-- 所有书display页面-->
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
				<a class="navbar-brand" href="#">LibrarySystem</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="#about">About</a></li>
					<li><a href="#contact">Contact</a></li>
					<li><a href="#" class="blank"></a></li>
					<li><a href="#">Welcome，
						<?php echo $_SESSION['user'] ?></a></li>
						<li><a href="../logout.php">Logout</a></li>
					</ul>
				</div>
				<!--/.nav-collapse -->
			</nav>
		</div>
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li class="active"><a href="logined_reader.php">Search </a></li>
				<li><a href="books.php">Display all<span class="sr-only current"></span></a></li>
				<li><a href="records.php">Records</a></li>
				<li><a href="#"></a></li>
			</ul>
			<ul class="nav nav-sidebar">
				<li><a href="change_password.php">Change password</a></li>
				<li><a href="show_info.php">Show the information</a></li>

			</ul>

		</div>
		<div class="container">
			<?php
			
			header("Content-type:text/html;charset=utf-8");  


			mysql_query("set names utf8");

			$sql = "SELECT * from bookdata where book_Name like '".$book_Name."';"; 

			$link = getLink();  

			$resoures = getResoures('test', $sql);  

			$info = mysql_fetch_array($resoures);  

			echo "<table class='table table-striped'>
			<tr>
			<th>summary</th>
			<th>price</th>
			</tr>";

			echo "<tr>";
			echo "<td>" . $info['summary'] . "</td>";
			echo "<td>" . $info['price'] . "</td>";
			echo "</tr>";

			echo "</table>";


	// echo "<input class='btn btn-primary' type='button' value='Go back' onclick='window.location.href('books.php')'/>";



			?>
		</div>
	</body>
	</html>

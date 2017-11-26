<?php
require("../globle.php");//字符组文件
require("../is_login.php");//检查是否登录
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
	<link href="../../css/records.css" rel="stylesheet">

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
					<li><a href="#">Welcome，<?php
					echo $_SESSION['user'] ?></a></li>
					<li><a href="../logout.php">Logout</a></li>
				</ul>
			</div>
			<!--/.nav-collapse -->

		</div>
	</nav>

	<div class="col-sm-3 col-md-2 sidebar">
		<ul class="nav nav-sidebar">
			<li><a href="logined_reader.php">Search </a></li>
			<li><a href="books.php">Display all</a></li>
			<li class="active"><a href="#">Records<span class="sr-only current"></span></a></li>
			<li><a href="#"></a></li>
		</ul>
		<ul class="nav nav-sidebar">
			<li><a href="change_password.php">Change password</a></li>
			<li><a href="show_info.php">Show the information</a></li>
		</ul>
	</div>
	<div class="col-lg-8 col-md-offset-2" id="table">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Book Name</th>
					<th>Book Id</th>
					<th>Borrow Date</th>
					<th>Return Date</th>
				</tr>
			</thead>

			<?php
			require("../MySqlUtils.php");  

//	$bookName=$_POST["search"];
			$userId=$_SESSION['user'];

			header("Content-type:text/html;charset=utf-8");  

			mysql_query("set names utf8");


			$isFirstNotNull = true;  

			if ($userId){  
				if ($isFirstNotNull){  
					$sql = " SELECT s1.bookname as book_Name_,
					s1.bookid as book_Id_,
					users.user_Name as user_Name_, s1.date1 as borrow_Data_,s1.date2 as return_Date_ FROM users INNER JOIN (SELECT borrow_records.book_Id as bookid, bookdata.book_Name as bookname,borrow_records.user_Id as id, borrow_records.borrow_Date as date1 ,borrow_records.return_Date as date2 FROM borrow_records INNER JOIN bookdata ON borrow_records.book_Id =bookdata.book_Id) as s1 ON s1.id =users.user_Id and users.user_Id=".$_SESSION['user'].";";  
				}else{}  
				$isFirstNotNull = false;  
			}  

 //$sql = $sql." order by ".$orderBy;//." CONVERT( name USING gbk ) COLLATE gbk_chinese_ci ASC";  
    //echo $sql;  
			$link = getLink();  
			if($link){  
				$resoures = getResoures('test', $sql);  
				if(!$resoures){  
					echo "<Script>alert('Failed!');</Script>";  
				}  





				$info = mysql_fetch_array($resoures);  
				if(!$info){  
					echo "<Script>alert('No borrow records!');</Script>"; 
				

				}  
				else
				{
					while($info){
						echo "<tr>";
						echo "<td>" . $info['book_Name_'] . "</td>";
						echo "<td>" . $info['book_Id_'] . "</td>";
						echo "<td>" . $info['borrow_Data_'] . "</td>";
						echo "<td>" . $info['return_Date_'] . "</td>";
						echo "</tr>";
						$info = mysql_fetch_array($resoures);
					}


				}



			}else{  
				echo "数据库连接失败";  
			}



			echo "</table>";

			closeConnect($link);

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
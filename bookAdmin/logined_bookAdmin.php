<?php
require("../globle.php");//字符组文件
require("../is_login.php");//检查是否登录
// require("is_bookAdmin.php");//检查是否为图书管理员
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
      <li class="active"><a href="logined_bookAdmin.php"><?php
      echo $bookAdmin_left_nav1_1; ?></a></li>
      <li><a href="search_name2id.php"><?php
      echo $bookAdmin_left_nav1_2; ?></a></li>
      <li><a href="insert_book_api.php"><?php
      echo $bookAdmin_left_nav1_3; ?></a></li>
      <li><a href="delete_book_by_id.php"><?php
      echo $bookAdmin_left_nav1_4; ?></a></li>
    </ul>	
	<?php include"bookAdmin_left_nav_common2.php"; ?>	
	<?php include"bookAdmin_left_nav_common3.php"; ?>	
	<?php include"bookAdmin_left_nav_common4.php"; ?>	
	</div>
	<div class="container">
	<?php
	header("Content-type:text/html;charset=utf-8");  

	$con = mysqli_connect('127.0.0.1','root','','test',3306);
	if (!$con)
	{
		die('Could not connect: ' . mysql_error());
	}

	mysql_select_db('test');

	mysql_query("set names utf8");
	$result = mysql_query("SELECT * FROM bookdata");
	?>




	<div class="books">
		<div class="row">

			<table class="table table-striped table-hover table-condensed">
				<thead>
					<tr>    
						<th>Id</th>
						<th>Name</th>
						<th>ISBN</th>
						<th>Author</th>
						<th>Press</th>
						<th>Is borrowed?</th>
						<th>Picture</th>
						<th>Type</th>	
						<th>Location</th>				
						<th>Price</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while($row = mysql_fetch_array($result))
					{
						echo "<tr>";
						echo "<td>" . $row['book_Id'] . "</td>";
						echo "<td>" . $row['book_Name'] . "</td>";
						
						echo "<td>" . $row['ISBN'] . "</td>";
						echo "<td>" . $row['author'] . "</td>";
						echo "<td>" . $row['publishing_House'] . "</td>";

						if($row['is_Borrow']==1)echo "<td>YES</td>";
						else echo "<td>NO</td>";

if(strpos($row['picture'],'ps')!=false){
  echo "<td><img width=100px height=125px src='" . $row['picture'] . "'/></td>";

}else{
    echo "<td><img width=100px height=125px src='Pic/" . $row['picture'] . "'/></td>";
}
						
						echo "<td>" . $row['type'] . "</td>";
						echo "<td>" . $row['location'] . "</td>";
						echo "<td>" . $row['price'] . "</td>";
						echo "</tr>";
					}
					mysqli_close($con);
					?>

				</tbody>
			</table>

		</div>
		<!-- 页码 -->
<!-- 	<nav aria-label="Page navigation">
		<ul class="pagination">
			<li>
				<a href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li>
				<a href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav> -->
</div>
</div>




    <!-- Bootstrap core JavaScript
    	================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->
    	<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    </body>
    </html>
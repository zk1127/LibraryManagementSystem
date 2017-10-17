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
	<link href="../css/bootstrap.css" rel="stylesheet">
	<!-- 自定义样式 -->
	<link href="../css/books.css" rel="stylesheet">

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
			<li ><a href="logined_reader.php">Search </a></li>
			<li class="active"><a href="books.php">Display all<span class="sr-only current"></span></a></li>
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

	
	<?php
header("Content-type:text/html;charset=utf-8");  

$con = mysqli_connect('127.0.0.1','root','','test',3306);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db('test');

mysql_query("set names utf8");
$result = mysql_query("SELECT DISTINCT b.book_Name as name,sq.count_b as cb,b.ISBN as isbn,b.author as atr,b.publishing_House as ph,b.picture as pci,b.type as tp,b.location as lc FROM bookdata b JOIN ( SELECT `book_Name`, COUNT(`book_Name`)as count_b FROM bookdata WHERE is_Borrow = 0 GROUP BY book_Name ) AS sq WHERE b.book_Name = sq.book_Name");
?>




	<div class="books">
		<div class="row">

			<table class="table table-striped">
				<thead>
					<tr>    
						<th>name</th>
						<th>remain</th>
						<th>ISBN</th>
						<th>author</th>
						<th>press</th>
						<th>picture</th>
						<th>type</th>
						<th>location</th>
					</tr>
				</thead>
				<tbody>
					<?php
					while($row = mysql_fetch_array($result))
					{
						echo "<tr>";

						echo "<td>" . $row['name'] . "</td>";
						echo "<td>" . $row['cb'] . "</td>";
						echo "<td>" . $row['isbn'] . "</td>";
						echo "<td>" . $row['atr'] . "</td>";
						echo "<td>" . $row['ph'] . "</td>";
	echo "<td><img width=100px height=125px src='bookAdmin/Pic/" . $row['pci'] . "'/></td>"; 
						echo "<td>" . $row['tp'] . "</td>";
						echo "<td>" . $row['lc'] . "</td>";
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

    <!-- Bootstrap core JavaScript
    	================================================== -->
    	<!-- Placed at the end of the document so the pages load faster -->
    	<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    	<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    	<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
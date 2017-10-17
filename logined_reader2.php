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
			</div><!--/.nav-collapse -->
			<!-- 读者个人信息 -->

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

		<div class="starter-template">
			<h1>Welcome to our Library System </h1>

		</div>
		<!-- 搜索书目 -->
		<div class="row">
			<div class="col-md-offset-3">
				<form action="logined_reader2.php" method="post">
					<div class="input-group">
						<input type="text" name="search" class="form-control input-lg"  placeholder="Search Books… " autofocus>
						<span class="input-group-btn">
							<button class="btn btn-primary btn-lg" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
						</span>

					</div>
				</form>
			</div>
		</div><!-- row -->
		<div class="">
			<div class="col-lg-10">
				<?php
				require("MySqlUtils.php");  

				$bookName=$_POST["search"];
				header("Content-type:text/html;charset=utf-8");  





				mysql_query("set names utf8");

				$sql = "SELECT DISTINCT b.book_Name";  
				$isFirstNotNull = true;  

				if ($bookName){  
					if ($isFirstNotNull){  
						$sql = $sql." as name,sq.count_b as cb,b.ISBN as isbn,b.author as atr,b.publishing_House as ph,b.picture as pci,b.type as tp,b.location as lc FROM bookdata b JOIN ( SELECT `book_Name`, COUNT(`book_Name`)as count_b FROM bookdata WHERE is_Borrow = 0 GROUP BY book_Name ) AS sq WHERE b.book_Name = sq.book_Name and b.book_Name like '%".$bookName."%'";  
					}else{  
						$sql = $sql." and book_Name like '%".$bookName."%'";  
					}  
					$isFirstNotNull = false;  
				}  

 //$sql = $sql." order by ".$orderBy;//." CONVERT( name USING gbk ) COLLATE gbk_chinese_ci ASC";  
    //echo $sql;  
				$link = getLink();  
				if($link){  
					$resoures = getResoures('test', $sql);  
					if(!$resoures){  
						echo "<Script>alert('查询失败 请检查查询设置或者联系系统管理员!');</Script>";  
						echo "<Script>window.location.href='logined_reader.php'</Script>";  
					}  



					$info = mysql_fetch_array($resoures);  
					if(!$info){  
						echo "<Script>alert('查询结果为空 请修改查询条件!');</Script>"; 
						echo "<Script>window.location.href='logined_reader.php'</Script>";   

					}  
					else
					{
						?>
						<div class="books">
							<div class="row">
								<table class="table table-striped">
									<?php	
									echo "
									<tr>
									<th>name</th>
									<th>remain</th>
									<th>ISBN</th>
									<th>author</th>
									<th>press</th>
									<th>pcn</th>
									<th>type</th>
									<th>location</th>
									</tr>";
									echo "<tr>";

									echo "<td>" . $info['name'] . "</td>";
									echo "<td>" . $info['cb'] . "</td>";
									echo "<td>" . $info['isbn'] . "</td>";
									echo "<td>" . $info['atr'] . "</td>";
									echo "<td>" . $info['ph'] . "</td>";
									echo "<td><img width=100px height=125px src='bookAdmin/Pic/" . $info['pci'] . "'/></td>"; 
									echo "<td>" . $info['tp'] . "</td>";
									echo "<td>" . $info['lc'] . "</td>";
									echo "</tr>";
								}
								while(true)
								{
									$info = mysql_fetch_array($resoures);  
									if(!$info){  
            //echo "<Script>alert('查询结果为空 请修改查询条件!');</Script>"; 
            //echo "<Script>window.location.href='table.html'</Script>";   
										break;
									}  
									else
									{
										echo "<tr>";

										echo "<td>" . $info['name'] . "</td>";
										echo "<td>" . $info['cb'] . "</td>";
										echo "<td>" . $info['isbn'] . "</td>";
										echo "<td>" . $info['atr'] . "</td>";
										echo "<td>" . $info['ph'] . "</td>";
										echo "<td><img width=100px height=125px src='bookAdmin/Pic/" . $info['pci'] . "'/></td>"; 
										echo "<td>" . $info['tp'] . "</td>";
										echo "<td>" . $info['lc'] . "</td>";
										echo "</tr>";
									}
								}





							}else{  
								echo "数据库连接失败";  
							}



							echo "</table></div></div>";

							closeConnect($link);





							?>
						</div>
					</div>
				</div><!-- /.container -->


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
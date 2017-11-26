<?php
require("../globle.php");//字符组文件
require("../is_login.php");//检查是否登录
require("../MySqlUtils.php");  

$bookName=$_POST["search"];
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
			<li class="active"><a href="search_name2id.php"><?php
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
		<h1>Search book's ID by their names</h1>	<br>
		<form class="form-horizontal" role="form" action="search_name2id2.php" method="post">
			<div class="form-group">
				<label class="col-sm-2 control-label">Book name</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" name="search" placeholder="book name" value="<?php echo $bookName;?>" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<input type="submit" name="submit" class="btn btn-primary" value="Search" />
				</div>
			</div>

		</form>
	</div>
	<div class="container">
		<?php





		mysql_query("set names utf8");

		$sql = "SELECT DISTINCT b.book_Name";  
		$isFirstNotNull = true;  

		if ($bookName){  
			if ($isFirstNotNull){  
				$sql = $sql." as name,b.book_Id as id,b.ISBN as isbn,b.author as atr,b.publishing_House as ph,b.picture as pci,b.type as tp,b.location as lc ,b.price as price_ ,b.is_Borrow as is_Borrow_ FROM bookdata b WHERE b.book_Name like '%".$bookName."%'";  
			}else{}  
			$isFirstNotNull = false;  
		}  

 //$sql = $sql." order by ".$orderBy;//." CONVERT( name USING gbk ) COLLATE gbk_chinese_ci ASC";  
    //echo $sql;  
		$link = getLink();  
		if($link){  
			$resoures = getResoures('test', $sql);  
			if(!$resoures){  
				echo "<Script>alert('please type into the text box!');</Script>";  
				echo "<Script>window.location.href='search_name2id.php'</Script>";  
			}  





			$info = mysql_fetch_array($resoures);  
			if(!$info){  
				echo "<Script>alert('No book name has these words!');</Script>"; 
				echo "<Script>window.location.href='search_name2id.php'</Script>";   

			}  
			else
			{
				?>

				<div class="books">
					<div class="row">

						<table class="table table-striped">
							<tr>
								<th>id</th>
								<th>name</th>
								<th>ISBN</th>
								<th>author</th>
								<th>press</th>
								<th>Is borrowed?</th>
								<th>picture</th>
								<th>type</th>
								<th>location</th>
								<th>price</th>
							</tr>
							<tr>
								<?php
								while($info){

									echo "<td>" . $info['id'] . "</td>";
									echo "<td>" . $info['name'] . "</td>";
									echo "<td>" . $info['isbn'] . "</td>";
									echo "<td>" . $info['atr'] . "</td>";
									echo "<td>" . $info['ph'] . "</td>";
									if($info['is_Borrow_']==1)echo "<td>YES</td>";
						else echo "<td>NO</td>";

									echo "<td><img width=100px height=125px src='../bookAdmin/Pic/" . $info['pci'] . "'/></td>"; 
									echo "<td>" . $info['tp'] . "</td>";
									echo "<td>" . $info['lc'] . "</td>";
									echo "<td>" . $info['price_'] . "</td>";
									echo "</tr>";
									$info = mysql_fetch_array($resoures);
								}


							}





						}else{  
							echo "数据库连接失败";  
						}



						echo "</table></div></div>";

						closeConnect($link);





						?>
					</div> 
				</body>
				</html>
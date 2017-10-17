<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>search</title>
	<link href="" rel="stylesheet">

</head>
<body>
	<div id="login">
		<h1>登录管理</h1>	
		<form action="search.php" method="post">

			<input type="text" name="search" placeholder="username">
			<input type="submit">

			


		</form>
	</div>
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
			echo "<Script>window.location.href='table.html'</Script>";  
		}  
		
		

		$info = mysql_fetch_array($resoures);  
		if(!$info){  
			echo "<Script>alert('查询结果为空 请修改查询条件!');</Script>"; 
			echo "<Script>window.location.href='table.html'</Script>";   
			
		}  
		else
		{
			echo "<table >
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
			echo "<td>" . $info['pci'] . "</td>";
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
				echo "<td>" . $info['pci'] . "</td>";
				echo "<td>" . $info['tp'] . "</td>";
				echo "<td>" . $info['lc'] . "</td>";
				echo "</tr>";
			}
		}





	}else{  
		echo "数据库连接失败";  
	}



	echo "</table>";

	closeConnect($link);





	?>

</body>
</html>
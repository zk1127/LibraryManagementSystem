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
		<h1>通过图书书名查询id</h1>	
		    <form action="search_user_id2record.php" method="post">
			<input type="text" name="search" placeholder="user id">
			<input type="submit">


		</form>
	</div>
	
	<?php
	require("MySqlUtils.php");  

	$userid=$_POST["search"];
	header("Content-type:text/html;charset=utf-8");  





	mysql_query("set names utf8");

	 
	$isFirstNotNull = true;  

	if ($userid){  
		if ($isFirstNotNull){  
			$sql = " SELECT s1.bookname as book_Name_,
  s1.bookid as book_Id_,
  users.user_Name as user_Name_, s1.date1 as borrow_Data_,s1.date2 as return_Date_ FROM users INNER JOIN (SELECT borrow_records.book_Id as bookid, bookdata.book_Name as bookname,borrow_records.user_Id as id, borrow_records.borrow_Date as date1 ,borrow_records.return_Date as date2 FROM borrow_records INNER JOIN bookdata ON borrow_records.book_Id =bookdata.book_Id) as s1 ON s1.id =users.user_Id and users.user_Id=".$userid.";";  
		}else{}  
		$isFirstNotNull = false;  
	}  

 //$sql = $sql." order by ".$orderBy;//." CONVERT( name USING gbk ) COLLATE gbk_chinese_ci ASC";  
    //echo $sql;  
	$link = getLink();  
	if($link){  
		$resoures = getResoures('test', $sql);  
		if(!$resoures){  
			echo "<Script>alert('查询失败 请检查查询设置或者联系系统管理员!');</Script>";  
			echo "<Script>window.location.href='search_user_id2record.html'</Script>";  
		}  
		
		

	
		
			$info = mysql_fetch_array($resoures);  
		if(!$info){  
			echo "<Script>alert('查询结果为空 请修改查询条件!');</Script>"; 
			echo "<Script>window.location.href='search_user_id2record.html'</Script>";   
			
		}  
		else
		{echo "<table >
			<tr>
			    <th>user name</th>
				<th>book name</th>
				<th>book id</th>
				<th>borrowed data</th>
				<th>return data</th>
				
			</tr>";
			echo "<tr>";

			while($info){
			
            echo "<td>" . $info['user_Name_'] . "</td>";
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

</body>
</html>
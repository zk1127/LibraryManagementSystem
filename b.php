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
<div id="b">
    <h1>借阅信息</h1> 
    <form action="b.php" method="post">

      <input type="submit">
           
      


    </form>
</div>
</body>
</html>
<?php
	require("MySqlUtils.php");  

//	$bookName=$_POST["search"];
	$userId="1";

	header("Content-type:text/html;charset=utf-8");  





	mysql_query("set names utf8");

	$sql = "SELECT DISTINCT *";  
	//$isFirstNotNull = true;  

	if ($userId){  
		// if ($isFirstNotNull){  
			$sql = $sql." FROM bookdata b,borrow_records WHERE b.book_Id = borrow_records.book_Id and user_Id =".$userId;  
		// }
		//else{  
		// 	$sql = $sql." and book_Name like '%".$bookName."%'";  
		// }  
		// $isFirstNotNull = false;  
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
			echo "<Script>alert('查询结果为空');</Script>"; 
			echo "<Script>window.location.href='table.html'</Script>";   
			
		}  
		else
		{
			echo "<table >
			<tr>
				<th>book_Name</th>
				<th>borrow_Date</th>
				<th>return_Deadline</th>
				<th>return_Date</th>
			</tr>";
			echo "<tr>";

			echo "<td>" . $info['book_Name'] . "</td>";
			echo "<td>" . $info['borrow_Date'] . "</td>";
			echo "<td>" . $info['return_Deadline'] . "</td>";
			echo "<td>" . $info['return_Date'] . "</td>";
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

			echo "<td>" . $info['book_Name'] . "</td>";
			echo "<td>" . $info['borrow_Date'] . "</td>";
			echo "<td>" . $info['return_Deadline'] . "</td>";
			echo "<td>" . $info['return_Date'] . "</td>";
			echo "</tr>";
			}
		}





	}else{  
		echo "数据库连接失败";  
	}



	echo "</table>";

	closeConnect($link);





	?>
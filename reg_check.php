<?php

//检查注册信息
//


		$user = $_POST["user"];
		$psw = $_POST["password"];
		$psw_confirm = $_POST["confirm"];

		if($user == "" || $psw == "" || $psw_confirm == "")
		{
			echo "<script>alert('Please finish the whole information！'); history.go(-1);</script>";
		}
		else
		{
			if($psw == $psw_confirm)
			{
				mysqli_connect('127.0.0.1','root','','test',3306);	//连接数据库
				mysql_select_db('test');	//选择数据库
				mysql_query("set names 'gdk'");	//设定字符集
				$sql = "select user_Id from users where user_Id = '$_POST[user]'";	//SQL语句
				$result = mysql_query($sql);	//执行SQL语句
				$num = mysql_num_rows($result);	//统计执行结果影响的行数
				if($num)	//如果已经存在该用户
				{
					echo "<script>alert('User has already exist!'); history.go(-1);</script>";
				}
				else	//不存在当前注册用户名称
				{
					$sql_insert = "insert into users (user_Id,user_Name,user_Pw,role) values('$_POST[user]','untitled','$_POST[password]',0)";
					$res_insert = mysql_query($sql_insert);
					//$num_insert = mysql_num_rows($res_insert);
					if($res_insert)
					{
						echo "<script>alert('register successfully！'); 
						window.location.href='login.html'</script>";
					}
					else
					{
						echo "<script>alert('System is busy！'); history.go(-1);</script>";
					}
				}
			}
			else
			{
				echo "<script>alert('Password is not consistent！'); history.go(-1);</script>";
			}
		}
?>
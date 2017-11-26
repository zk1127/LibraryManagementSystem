<?php  
//检查登录信息
    /* 0 admin登入成功 
     * 1 admin密码错误 
     * 2 admin管理员不存在 
     *  
     * 3 user登入成功 
     * 4 user密码错误 
     * 5 user用户名不存在 
     */  

session_start();//开启session

require("MySqlUtils.php");  
header("Content-type:text/html;charset=utf-8");  

$username = $_POST["user"];  
$password = $_POST["password"];    

$link = getLink();  

$sql1="select * from users where user_Id=".$username.";";
$resoures = getResoures('test', $sql1);  
$info = mysqli_fetch_array($resoures);  
if($info)
{  
  $u = $info['user_Id'];  
  $p = $info['user_Pw'];
  $r = $info["role"];
      //判断用户类型  0系统 1普通 2图书
}
    //确定用户类型
if ($r == 0)
{  
 $r = systemAdminLogin($username, $password);  
}
else if($r == 1)
{  
 $r = userLogin($username, $password);
}
else if($r == 2)
{  
 $r = bookAdminLogin($username, $password);
}    

selectNext($r);  
function selectNext($r){  
 if($r == 0){    
            $_SESSION['user'] = $_POST['user'];//将登录名保存到session中
            echo "<Script>alert('Login successfully');</Script>";  
            echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=systemAdmin/logined_systemAdmin.php">';
          }else if ($r == 1) {  
           echo "<Script>alert('Wrong password,please write again');</Script>";  
           echo "<Script>window.location.href='login.html'</Script>"; 
         }else if ($r == 2){  
           echo "<Script>alert('user is not exist');</Script>";  
           echo "<Script>window.location.href='login.html'</Script>";  
         }else if ($r == 3){  
           $_SESSION['user'] = $_POST['user'];
       //将登录名保存到session中
           echo "<Script>alert('Login successfully');</Script>"; 
           echo '<META HTTP-EQUIV="Refresh" CONTENT="0; URL=logined_reader/logined_reader.php">';

         }else if ($r == 4){  
          echo "<Script>alert('Wrong password,please write again');</Script>";  
          echo "<Script>window.location.href='login.html'</Script>"; 
        }else if ($r == 5){  
          echo "<Script>alert('User is not exist,please register');</Script>";  
          echo "<Script>window.location.href='login.html'</Script>"; 
        }
        else if ($r == 6){  
         $_SESSION['user'] = $_POST['user'];
         echo "<Script>alert('Login successfully');</Script>";   
         echo "<Script>window.location.href='bookAdmin/logined_bookAdmin.php'</Script>";   
       }    
     }  

     function systemAdminLogin($username, $password){  

       $link = getLink();  
       $resoures = getResoures('test', 'select * from users;');  
       $info = mysqli_fetch_array($resoures);  
       while($info){  
        $u = $info['user_Id'];  
        $p = $info['user_Pw'];
        if ($username == $u) {  
         if ($password == $p) {  
          return 0;  
        }else{  
          return 1;  
        }  
      }  
      $info = mysqli_fetch_array($resoures);  
    }  
    closeConnect($link);  
    return 2;  
  }  

  function userLogin($username, $password){  
   $link = getLink();  
   $resoures = getResoures('test', 'select * from users;');  
   $info = mysql_fetch_array($resoures);  
   while($info){  
    $u = $info['user_Id'];  
    $p = $info['user_Pw'];  
    if ($username == $u) {  
     if ($password == $p) {  
      return 3;  
    }else{  
      return 4;  
    }  
  }  
  $info = mysql_fetch_array($resoures);  
}  
closeConnect($link);  
return 5;     
} 
function bookAdminLogin($username, $password){  
	$link = getLink();  
	$resoures = getResoures('test', 'select * from users;');  
	$info = mysql_fetch_array($resoures);  
	while($info){  
		$u = $info['user_Id'];  
		$p = $info['user_Pw'];  
		if ($username == $u) {  
			if ($password == $p) {  
				return 6;  
			}else{  
				return 1;  
			}  
		}  
		$info = mysql_fetch_array($resoures);  
	}  
	closeConnect($link);  
	return 2;     
}   

?>  
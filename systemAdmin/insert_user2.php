<?php
require("../globle.php");
session_start();//开启session
require("../MySqlUtils.php");  
header("Content-type:text/html;charset=utf-8");  


$user_Id = $_POST['user_Id'];  
$user_Name = $_POST['user_Name'];  
$user_Pw = $_POST['user_Pw'];  
$role = $_POST['role'];  


    //用户id  

if (null == $user_Id ){  
  echo "<Script>alert('ID is required')</Script>";  
            echo "<Script>window.location.href='insert_user.php'</Script>";  
  return false;  
}  
        //用户姓名  

if (null == $user_Name){  
  echo "<Script>alert('Name is required')</Script>";  
  echo "<Script>window.location.href='insert_user.php'</Script>";  
  return false;  
}  
        //作者  

if (null == $user_Pw){  
  echo "<Script>alert('Password is required')</Script>";  
  echo "<Script>window.location.href='insert_user.php'</Script>";  
  return false;  
}  


$isRightInsert = insertUser();  
if ($isRightInsert){  
  echo "<Script>alert('Insert successfully')</Script>";  
  echo "<Script>window.location.href='insert_user.php'</Script>";  
}else{  
  echo "<Script>alert('The ID is exist!')</Script>";  
       echo "<Script>window.location.href='insert_user.php'</Script>";  
}


function insertUser(){  
 

  global $user_Id;  
  global $user_Name;  
  global $user_Pw;  
  global $role;  
  

  $link = getLink();  
  if ('0' == $link){  
    echo "<Script>alert('数据库连接失败');</Script>";  
    return false;  
  }  

  

  $sql = "insert into `users` (`user_Id`, `user_Name`, `user_Pw`, `role`) values(".$user_Id.",'".$user_Name."',"."'".$user_Pw."',".$role.");";  


  $isRightInsert = getResoures('test', $sql);  

  closeConnect($link);  
  return $isRightInsert;  
}  



?>

</body>
</html>

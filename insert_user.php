<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>index</title>
<link href="" rel="stylesheet">

</head>
<body>
<div id="add">
<h1>添加用户</h1>  
 <form action="insert_user.php" name="form" method="post" enctype="multipart/form-data">
  <input type="text" name="user_Id" placeholder="user_Id"/>
  <input type="text" name="user_Name" placeholder="user_Name"/>
  <input type="text" name="user_Pw" placeholder="user_Pw"/>
  <!-- <input type="text" name="role" placeholder="role"/> -->
  <select name="contents">
  <option value="0">Administrator</option>
  <option value="1">librarier</option>
  <option value="2">reader</option>
  </select>
  <input type="submit" name="submit" value="添加用户" />


</form>
</div>


<?php

require("MySqlUtils.php");  
header("Content-type:text/html;charset=utf-8");  


    $user_Id = $_POST['user_Id'];  
    $user_Name = $_POST['user_Name'];  
    $user_Pw = $_POST['user_Pw'];  
    $role = $_POST['contents'];  


    //用户id  
        
        if (null == $user_Id ){  
            echo "<Script>alert('用户id不能为空')</Script>";  
            // echo "<Script>window.location.href='insert_user'</Script>";  
            return false;  
        }  
        //用户姓名  
         
        if (null == $user_Name){  
            echo "<Script>alert('用户姓名不能为空')</Script>";  
            echo "<Script>window.location.href='insert_user.php'</Script>";  
            return false;  
        }  
        //作者  
        
        if (null == $user_Pw){  
            echo "<Script>alert('密码不能为空')</Script>";  
            echo "<Script>window.location.href='insert_user.php'</Script>";  
            return false;  
        }  
        

   $isRightInsert = insertUser();  
    if ($isRightInsert){  
        echo "<Script>alert('添加成功')</Script>";  
        echo "<Script>window.location.href='insert_user.php'</Script>";  
    }else{  
        echo "<Script>alert('添加失败,请重试!')</Script>";  
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

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>index</title>
<link href="" rel="stylesheet">

</head>
<body>
<div id="login">
<h1>删除用户</h1>  
 <form action="delete_user_by_id.php" name="form" method="post" enctype="multipart/form-data">
  <input type="text" name="user_Id" placeholder="user_Id"/>
 
  <input type="submit" name="submit" value="删除用户" />


</form>
</div>


<?php




require("MySqlUtils.php");  
header("Content-type:text/html;charset=utf-8");  


    $user_Id = $_POST['user_Id'];  
       

    //图书id校验  完整
        global $user_Id ;  
        if (null == $user_Id ){  
            echo "<Script>alert('人的id不能为空')</Script>";  
            // echo "<Script>window.location.href='delete_user_by_id.php'</Script>";  
            return false;  
        }  


///////////////////////////////////
///信息删除


  
   $isRightInsert = deleteUser();  
    if ($isRightInsert){  
        echo "<Script>alert('删除成功')</Script>";  
        echo "<Script>window.location.href='delete_user_by_id.php'</Script>";  
    }else{  
        echo "<Script>alert('删除失败,请重试!')</Script>";  
       // echo "<Script>window.location.href='insert_book.php'</Script>";  
    }  


    
  
    function deleteUser(){  
         

    global $user_Id;  
   

        $link = getLink();  
        if ('0' == $link){  
            echo "<Script>alert('数据库连接失败');</Script>";  
            return false;  
        }  

      

        $sql = "DELETE FROM users WHERE user_Id = '".$user_Id."';"; 


          


        $isRightInsert = getResoures('test', $sql);  

        closeConnect($link);  
        return $isRightInsert;  
    }  



  ?>

  </body>
</html>

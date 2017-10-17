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
<h1>登记借书信息</h1>  
 <form action="insert_record.php" name="form" method="post" enctype="multipart/form-data">
  <input type="text" name="user_Id" placeholder="user_Id"/>
  <input type="text" name="book_Id" placeholder="book_Id"/>
  

  <input type="submit" name="submit" value="添加借书记录" />


</form>
</div>


<?php




require("MySqlUtils.php");  
header("Content-type:text/html;charset=utf-8");  


    $user_Id = $_POST['user_Id'];  
    $book_Id = $_POST['book_Id'];  
///////////////////////////////检查信息完整
    $isRightForm = checkForm();  


///////////////////////////////////
///信息添加
///


   $isRightInsert = insertBook();  
    if ($isRightInsert){  
        echo "<Script>alert('添加成功')</Script>";  
        echo "<Script>window.location.href='insert_record.php'</Script>";  
    }else{  
        echo "<Script>alert('添加失败,请重试!')</Script>";  
       // echo "<Script>window.location.href='insert_record.php'</Script>";  
    }  


    function checkForm(){  
      
         
        global $user_Id ;  
        if (null == $user_Id ){  
            // echo "<Script>alert('用户id不能为空')</Script>";  
            // echo "<Script>window.location.href='insert_record.php'</Script>";  
            return false;  
        }  
      
        global $book_Id;  
        if (null == $book_Id){  
            echo "<Script>alert('图书id不能为空')</Script>";  
            echo "<Script>window.location.href='insert_record.php'</Script>";  
            return false;  
        }  
      
     
        
        
        return true;  
    }  
  
    function insertBook(){  
         

    global $user_Id;  
    global $book_Id;  

        $link = getLink();  
        if ('0' == $link){  
            echo "<Script>alert('数据库连接失败');</Script>";  
            return false;  
        }  

      
       $sql = "UPDATE bookdata SET is_Borrow = 1 WHERE book_Id = ".$book_Id.";";  
       
         MySQL_query($sql);

        getResoures('test', $sql); 


        $sql = "insert into `borrow_records` (`user_Id`, `book_Id`) values(".$user_Id.",".$book_Id.");";  


        $isRightInsert = getResoures('test', $sql);  

        closeConnect($link);  
        return $isRightInsert;  
    }  



  ?>

  </body>
</html>

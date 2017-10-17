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
<h1>删除书籍</h1>  
 <form action="delete_book_by_id.php" name="form" method="post" enctype="multipart/form-data">
  <input type="text" name="book_Id" placeholder="book_Id"/>
 
  <input type="submit" name="submit" value="删除书籍" />


</form>
</div>


<?php




require("MySqlUtils.php");  
header("Content-type:text/html;charset=utf-8");  


    $book_Id = $_POST['book_Id'];  
       

    //图书id校验  完整
        global $book_Name ;  
        if (null == $book_Id ){  
            echo "<Script>alert('图书id不能为空')</Script>";  
            // echo "<Script>window.location.href='delete_book_by_id.php'</Script>";  
            return false;  
        }  


///////////////////////////////////
///信息删除


  
   $isRightInsert = deleteBook();  
    if ($isRightInsert){  
        echo "<Script>alert('图书删除成功')</Script>";  
        echo "<Script>window.location.href='delete_book_by_id.php'</Script>";  
    }else{  
        echo "<Script>alert('图书删除失败,请重试!')</Script>";  
       // echo "<Script>window.location.href='insert_book.php'</Script>";  
    }  


    
  
    function deleteBook(){  
         

    global $book_Id;  
   

        $link = getLink();  
        if ('0' == $link){  
            echo "<Script>alert('数据库连接失败');</Script>";  
            return false;  
        }  

      

        $sql = "DELETE FROM bookdata WHERE book_Id = '".$book_Id."';"; 


          


        $isRightInsert = getResoures('test', $sql);  

        closeConnect($link);  
        return $isRightInsert;  
    }  



  ?>

  </body>
</html>

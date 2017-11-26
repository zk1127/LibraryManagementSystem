<?php
require("../MySqlUtils.php");  
require("../is_login.php");//检查是否登录
header("Content-type:text/html;charset=utf-8");  


$book_Id = $_POST['book_Id'];  

//图书id校验  完整
global $book_Name ;  
if (null == $book_Id ){  
  echo "<Script>alert('Book Id is empty!')</Script>";  
            echo "<Script>window.location.href='delete_book_by_id.php'</Script>";  
  return false;  
}  

///////////////////////////////////
///信息删除

$isRightInsert = deleteBook();  
if ($isRightInsert){ 

  echo "<Script>alert('delete successfully.')</Script>";

  echo "<Script>window.location.href='delete_book_by_id.php'</Script>";  
}else{  
  echo "<Script>alert('fail to delete the book, please try again.')</Script>";  
       echo "<Script>window.location.href='delete_book_by_id.php'</Script>";  
}  

function deleteBook(){  


  global $book_Id;  


  $link = getLink();  
  if ('0' == $link){  
    echo "<Script>alert('fail to connect the database!');</Script>";  
    return false;  
  }  

$sql = "select * FROM bookdata WHERE book_Id = ".$book_Id.";"; 
$resoures = getResoures('test', $sql);  
        if(!$resoures){  
          echo "<Script>alert('please type into the text box!');</Script>";  
          echo "<Script>window.location.href='delete_book_by_id.php'</Script>";



        }

        $info = mysql_fetch_array($resoures);  

        if(!$info){  
          echo "<Script>alert('There's no such book, please change the id!');</Script>"; 
          echo "<Script>window.location.href='delete_book_by_id.php'</Script>";   

        }  
         

         if($info['is_Borrow']==1){  
          echo "<Script>alert('Book has been lend out, you cannot delete it!');</Script>"; 
          echo "<Script>window.location.href='delete_book_by_id.php'</Script>";   

        }  



  $sql = "DELETE FROM bookdata WHERE book_Id = '".$book_Id."';"; 


  $isRightInsert = getResoures('test', $sql);  

  closeConnect($link);  
  return $isRightInsert;  
}  


?>
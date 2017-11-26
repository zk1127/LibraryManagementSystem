<?php
require("../globle.php");
session_start();//开启session
if(!isset($_SESSION['user']))
{
  echo "<Script>alert('Please login');</Script>";
  echo "<Script>window.location.href='../login.html'</Script>";
}

require("../MySqlUtils.php");  
header("Content-type:text/html;charset=utf-8");  



$book_Id = $_POST['book_Id'];  
///////////////////////////////检查信息完整
$isRightForm = checkForm();  


///////////////////////////////////
///信息添加
///

$isRightInsert = insertBook();  
if ($isRightInsert){  
  echo "<Script>alert('successfully')</Script>";  
  echo "<Script>window.location.href='fill_record.php'</Script>";  
}else{  
  echo "<Script>alert('fail to register, please try again!')</Script>";  
       // echo "<Script>window.location.href='insert_record.php'</Script>";  
}  


function checkForm(){  


  global $book_Id;  
  if (null == $book_Id){  
    echo "<Script>alert('No id!')</Script>";  
            echo "<Script>window.location.href='fill_record.php'</Script>";  
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

  $sql = "select * from bookdata WHERE book_Id = ".$book_Id.";";  

 $resoures = getResoures('test', $sql);
 if(!$resoures){  
        echo "<Script>alert('please type the book id into the text box!');</Script>";  
        echo "<Script>window.location.href='fill_record.php'</Script>";  
      }  
$info = mysql_fetch_array($resoures);  
      if(!$info){  
        echo "<Script>alert('Wrong book id!');</Script>"; 
        echo "<Script>window.location.href='fill_record.php'</Script>";   

      }  
      if(0==$info['is_Borrow']){  
        echo "<Script>alert('This book has not lend out!');</Script>"; 
        echo "<Script>window.location.href='fill_record.php'</Script>";   

      }  

  $sql = "UPDATE bookdata SET is_Borrow = 0 WHERE book_Id = ".$book_Id.";";  

  getResoures('test', $sql); 

  date_default_timezone_set('PRC'); 
  $timenow=date("Y-m-d H:i:s");

  $sql = "UPDATE `borrow_records` SET`return_Date`='".$timenow."' WHERE book_Id=".$book_Id." and return_Date IS null;
  ";  


  $isRightInsert = getResoures('test', $sql);  

  closeConnect($link);  
  return $isRightInsert;  
}  


?>
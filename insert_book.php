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
 <form action="insert_book.php" name="form" method="post" enctype="multipart/form-data">
  <input type="text" name="book_Name" placeholder="book_Name"/>
  <input type="text" name="location" placeholder="location"/>
  <input type="text" name="ISBN" placeholder="ISBN"/>
  <input type="text" name="author" placeholder="author"/>
  <input type="text" name="publishing_House" placeholder="publishing_House"/>
  <input type="text" name="type" placeholder="type"/>
  <input type="text" name="number" placeholder="number" />

  <input type="file" name="file" />

  <input type="submit" name="submit" value="添加书籍" />


</form>
</div>


<?php




require("MySqlUtils.php");  
header("Content-type:text/html;charset=utf-8");  


    $book_Name = $_POST['book_Name'];  
    $location = $_POST['location'];  
    $ISBN = $_POST['ISBN'];  
    $author = $_POST['author'];  
    $publishing_House = $_POST['publishing_House'];  
    $author = $_POST['author'];  
    $type = $_POST['type'];  
    $number = $_POST['number'];   
///////////////////////////////检查信息完整
    $isRightForm = checkForm();  

///////////////////////////////////
///图片上传
$file = $_FILES['file'];//得到传输的数据
//得到文件名称
$picture = $file['name'];
$type_ = strtolower(substr($picture,strrpos($picture,'.')+1)); //得到文件类型，并且都转化成小写
$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
if(!in_array($type_, $allow_type)){
  //如果不被允许，则直接停止程序运行
  return ;
}
//判断是否是通过HTTP POST上传的
if(!is_uploaded_file($file['tmp_name'])){
  //如果不是通过HTTP POST上传的
  return ;
}
$upload_path = "../library/Pic/"; //上传文件的存放路径
//开始移动文件到相应的文件夹
//



if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
  echo "Successfully update picture";
}else{
  echo "Failed to update picture";
}

    

///////////////////////////////////
///信息添加
///
$ii=1;

while ( $ii<= $number) {
  
   $isRightInsert = insertBook();  
    if ($isRightInsert){  
        echo "<Script>alert('图书入库成功')</Script>";  
        echo "<Script>window.location.href='insert_book.php'</Script>";  
    }else{  
        echo "<Script>alert('图书入库失败,请重试!')</Script>";  
       // echo "<Script>window.location.href='insert_book.php'</Script>";  
    }  
    $ii=$ii+1;

  }

    function checkForm(){  
      
        //图书名称校验  
        global $book_Name ;  
        if (null == $book_Name ){  
            // echo "<Script>alert('图书名称不能为空')</Script>";  
            // echo "<Script>window.location.href='insert_book.php'</Script>";  
            return false;  
        }  
        //出版社  
        global $publishing_House;  
        if (null == $publishing_House){  
            echo "<Script>alert('出版社不能为空')</Script>";  
            echo "<Script>window.location.href='insert_book.php'</Script>";  
            return false;  
        }  
        //作者  
        global $author;  
        if (null == $author){  
            echo "<Script>alert('作者不能为空')</Script>";  
            echo "<Script>window.location.href='insert_book.php'</Script>";  
            return false;  
        }  
        
        //插入数目  
        global $number;  
        if (null == $number){  
            echo "<Script>alert('数量不能为空')</Script>";  
            echo "<Script>window.location.href='insert_book.php'</Script>";  
            return false;  
        }  
        $isRightAllNumber = preg_match('/[0-9]/', $number);  
        if (!$isRightAllNumber){  
            echo "<Script>alert('图书库存含有非法字符')</Script>";  
            echo "<Script>window.location.href='insert_book.php'</Script>";  
            return false;  
        }  
        return true;  
    }  
  
    function insertBook(){  
         

    global $book_Name;  
    global $location;  
    global $ISBN;  
    global $author;  
    global $publishing_House;  
    global $author;  
    global $type;  
    global $number;
    global $picture;

        $link = getLink();  
        if ('0' == $link){  
            echo "<Script>alert('数据库连接失败');</Script>";  
            return false;  
        }  

       $sql_find_id = "SELECT MAX(book_Id)+1 as id FROM `bookdata` ";

       $resoures = getResoures('test', $sql_find_id);  
       $book_Id= mysql_fetch_array($resoures); 





        $sql = "insert into `bookdata` (`book_Id`, `book_Name`, `author`, `ISBN`, `publishing_House`, `is_Borrow`, `picture`, `type`, `location`) values(".$book_Id['id'].",'".$book_Name."',"."'".$author."',"."'".$ISBN."',"."'".$publishing_House."',"."0".","."'".$picture."',"."'".$type."',"."'".$location."');";  


        $isRightInsert = getResoures('test', $sql);  

        closeConnect($link);  
        return $isRightInsert;  
    }  



  ?>

  </body>
</html>

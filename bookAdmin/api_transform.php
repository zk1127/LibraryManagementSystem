<?php
require("../globle.php");//字符组文件
require("../is_login.php");//检查是否登录
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Bootstrap core CSS -->
  <link href="../../css/bootstrap.css" rel="stylesheet">
  <!-- 自定义样式 -->
  <link href="../../css/books.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
      </button>
      <p1 class="navbar-brand white">LibrarySystem</p1>
  </div>
  <div id="navbar" class="collapse navbar-collapse">
    <?php include"../top_nav_common.php"; ?>
</div>
<!--/.nav-collapse -->

</div>
</nav>
<div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
      <li><a href="logined_bookAdmin.php"><?php
      echo $bookAdmin_left_nav1_1; ?></a></li>
      <li><a href="search_name2id.php"><?php
      echo $bookAdmin_left_nav1_2; ?></a></li>
      <li class="active"><a href="insert_book_api.php"><?php
      echo $bookAdmin_left_nav1_3; ?></a></li>
      <li><a href="delete_book_by_id.php"><?php
      echo $bookAdmin_left_nav1_4; ?></a></li>
      <li><a href=""><?php
      echo $bookAdmin_left_nav1_5; ?></a></li>
      <li><a href=""><?php
      echo $bookAdmin_left_nav1_6; ?></a></li>
      
  </ul>
  <?php include"bookAdmin_left_nav_common2.php"; ?> 
  <?php include"bookAdmin_left_nav_common3.php"; ?> 
  <?php include"bookAdmin_left_nav_common4.php"; ?> 
</div>
<div class="container">
    <br>

<?php
require("../MySqlUtils.php");  
header("Content-type:text/html;charset=utf-8");  

$book_Name=$_POST['book_Name'];  
$location =$_POST['location-campus'].'-'.$_POST['location-floor'].'-'.$_POST['location'];  
$ISBN = $_POST['ISBN'];  
$author = $_POST['author'];  
$publishing_House = $_POST['publishing_House'];   
$type = $_POST['type'];  
$number = $_POST['number'];
$picture=$_POST['picture'];  
$book_info=$_POST['book_info']; 
$price=$_POST['price'];
///////////////////////////////检查信息完整
$isRightForm = checkForm();  

///////////////////////////////////



///////////////////////////////////
///信息添加
///
$ii=1;

while ( $ii<= $number) {

 $isRightInsert = insertBook();  
 if ($isRightInsert){  

    echo "<img src='http://barcode.tec-it.com/barcode.ashx?data=".$isRightInsert."' alt='Barcode Software by TEC-IT'  />";
    echo "<p>";


}else{  
    echo "<Script>alert('fail to insert the book, please try again!')</Script>";  
       // echo "<Script>window.location.href='insert_book.php'</Script>";  
}  
$ii=$ii+1;


}


function _post($str){
    $val = !empty($_POST[$str]) ? $_POST[$str] : null;
    return $val;
}



function checkForm(){  

        //图书名称校验  
    global $book_Name ;  
    if (null == $book_Name ){  
            echo "<Script>alert('No book name!')</Script>";  
            echo "<Script>window.location.href='insert_book_api.php'</Script>";  
        return false;  
    }  
        //出版社  
    global $publishing_House;  
    if (null == $publishing_House){  
        echo "<Script>alert('No press!')</Script>";  
        echo "<Script>window.location.href='insert_book_api.php'</Script>";  
        return false;  
    }  
        //作者  
    global $author;  
    if (null == $author){  
        echo "<Script>alert('No author!')</Script>";  
        echo "<Script>window.location.href='insert_book_api.php'</Script>";  
        return false;  
    }  

        //插入数目  
    global $number;  
    if (null == $number){  
        echo "<Script>alert('The amount of the book is necessary!')</Script>";  
        echo "<Script>window.location.href='insert_book_api.php'</Script>";  
        return false;  
    }  
    $isRightAllNumber = preg_match('/[0-9]/', $number);  
    if (!$isRightAllNumber){  
        echo "<Script>alert('The amount of the book must be number')</Script>";  
        echo "<Script>window.location.href='insert_book_api.php'</Script>";  
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
    global $book_info;
    global $price;

    $link = getLink();  
    if ('0' == $link){  
        echo "<Script>alert('数据库连接失败');</Script>";  
        return false;  
    }  

    $sql_find_id = "SELECT MAX(book_Id)+1 as id FROM `bookdata` ";

    $resoures = getResoures('test', $sql_find_id);  
    $book_Id= mysql_fetch_array($resoures); 


    mysql_query("set names utf8");


    $sql = "insert into `bookdata` (`book_Id`, `book_Name`, `author`, `ISBN`, `publishing_House`, `is_Borrow`, `picture`, `type`, `location`, `summary`, `price`) values(".$book_Id['id'].",'".$book_Name."',"."'".$author."',"."'".$ISBN."',"."'".$publishing_House."',"."0".","."'".$picture."',"."'".$type."',"."'".$location."',"."'".$book_info."',"."'".$price."');";  


    $isRightInsert = getResoures('test', $sql);  

    closeConnect($link); 


        // return $isRightInsert; 
    return $book_Id['id'];
}  



?>
<?php
require("../globle.php");//字符组文件
require("../is_login.php");//检查是否登录
?>

    <div class="form-group">
    <div class="col">
      <input type="button" name="back" class="btn btn-primary" value="Go Back" onclick='javascript:history.go(-2);' />
    </div>
  </div>

</div>
</body>
</html>

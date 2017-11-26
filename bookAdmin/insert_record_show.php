<?php
require("../globle.php");//字符组文件
require("../is_login.php");//检查是否登录
require("../MySqlUtils.php");  
$user_Id = $_POST['user_Id'];  
$book_Id = $_POST['book_Id'];  
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
   <?php include"bookAdmin_left_nav_common.php"; ?> 
   <ul class="nav nav-sidebar">
    <li><a href="show_all_record.php"><?php
    echo $bookAdmin_left_nav2_1; ?></a></li>
    <li><a href="search_user_id2record.php"><?php
    echo $bookAdmin_left_nav2_2; ?></a></li>
    <!-- 增加借书记录 -->
    <li class="active"><a href="insert_record.php"><?php
    echo $bookAdmin_left_nav2_3; ?></a></li>
    <!-- 登记还书时间 -->
    <li><a href="fill_record.php"><?php
    echo $bookAdmin_left_nav2_4; ?></a></li>    
  </ul>
  <?php include"bookAdmin_left_nav_common3.php"; ?> 
  <?php include"bookAdmin_left_nav_common4.php"; ?> 
</div>

<div class="container">
 <h1>Lend Books</h1>  <br>

 <form class="form-horizontal" role="form" action="insert_record_show.php" name="form" method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label class="col-sm-2 control-label">User_Id</label>
    <div class="col-sm-4">
      <input class="form-control" type="text" name="user_Id" value="<?php echo($user_Id); ?>" />
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Book_Id</label>
    <div class="col-sm-4">
      <input class="form-control" type="text" name="book_Id" value="<?php echo($book_Id); ?>" />
    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="submit" value="Check The Information" class="btn btn-primary" />
    </div>
  </div>

</form>



<?php




///////////////////////////////检查信息完整
   checkForm();  
///////////////////////////////显示图书信息和读者信息
showInfo();  

//////////////////////////////////
///信息添加
///
echo '
<form action="insert_record2.php" name="form" method="post" enctype="multipart/form-data">
<input type="text" name="user_Id" style="visibility:hidden" value="'.$user_Id.'"/>';
echo'

<input type="text" name="book_Id" style="visibility:hidden" value="'.$book_Id.'"/>';

echo'
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" name="submit" value="Lend The Book" class="btn btn-primary" />
    </div>
  </div>

</form>
';



function checkForm(){  


  global $user_Id ;  
  global $book_Id ;  
  if (null == $user_Id ){  
            echo "<Script>alert('No user id')</Script>";  
            echo "<Script>window.location.href='insert_record.php'</Script>";   
  }  

  global $book_Id;  
  if (null == $book_Id){  
    echo "<Script>alert('No book id')</Script>";  
    echo "<Script>window.location.href='insert_record.php'</Script>"; 
  }  




  return true;  
}  

function showInfo(){



  global $user_Id;  
  global $book_Id; 

  $link = getLink();  
  if ('0' == $link){  
    echo "<Script>alert('数据库连接失败');</Script>";  
    return false;  
  }  

  $sql = "select * from users WHERE user_Id = ".$user_Id.";";         

  $resoures = getResoures('test', $sql); 
  $info = mysql_fetch_array($resoures);

if(!$info){  
        echo "<Script>alert('wrong user id');</Script>"; 
        echo "<Script>window.location.href='insert_record.php'</Script>";   

      }  

        $sql = "select * from bookdata WHERE book_Id = ".$book_Id.";";         

  $resoures = getResoures('test', $sql); 
  $info = mysql_fetch_array($resoures);

if(!$info){  
        echo "<Script>alert('wrong book id');</Script>"; 
        echo "<Script>window.location.href='insert_record.php'</Script>";   

      }  



  mysql_query("set names utf8");
  $sql1 = "select * from users WHERE user_Id = ".$user_Id.";";         

  $resoures = getResoures('test', $sql1); 
  $info = mysql_fetch_array($resoures);
  if($info){
     echo "<h1>Reader Information</h1>";
    echo "<table class='table table-striped'><tr>";
    echo "<th>"."Reader name"."</th>";
      echo "<th>"."Fine"."</th></tr>"; 
    echo "<tr><td>" . $info['user_Name'] . "</td>";
      
    echo "<td>" . $info['fine'] . "yuan</td>";                    
    echo "</tr></table >";
    echo "<br>";
  }
    mysql_query("set names utf8");
    $sql2 = "select * from bookdata WHERE book_Id = ".$book_Id.";";         

    $resoures = getResoures('test', $sql2); 
    $info = mysql_fetch_array($resoures);
    if($info){

      echo "<h1>Book Information</h1>";
      echo "<table class='table table-striped'><tr>";

      if(strpos($info['picture'],'ps')!=false){
        echo "<td><img src='" . $info['picture'] . "'/></td>";

      }else{
        echo "<td><img src='Pic/" . $info['picture'] . "'/></td>";
      }
      echo "<td>" . $info['book_Name'] . "</td>";
      echo "<td>" . $info['location'] . "</td>";
      echo "<td>" . $info['ISBN'] . "</td>";
      echo "<td>" . $info['author'] . "</td>";
      echo "<td>" . $info['publishing_House'] . "</td>";                    
      echo "</tr></table >";}





      closeConnect($link);
      return 1; 



    }




    ?>
  </div>
</body>
</html>

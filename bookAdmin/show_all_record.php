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
  <?php include"bookAdmin_left_nav_common.php"; ?> 
  <ul class="nav nav-sidebar">
   <li class="active"><a href="show_all_record.php"><?php
   echo $bookAdmin_left_nav2_1; ?></a></li>
   <li><a href="search_user_id2record.php"><?php
   echo $bookAdmin_left_nav2_2; ?></a></li>
   <!-- 增加借书记录 -->
   <li><a href="insert_record.php"><?php
   echo $bookAdmin_left_nav2_3; ?></a></li>
   <!-- 登记还书时间 -->
   <li><a href="fill_record.php"><?php
   echo $bookAdmin_left_nav2_4; ?></a></li>  
 </ul>
 <?php include"bookAdmin_left_nav_common3.php"; ?> 
 <?php include"bookAdmin_left_nav_common4.php"; ?> 
</div>
<div class="container">
  <?php

  $con = mysqli_connect('127.0.0.1','root','','test',3306);
  if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

  mysql_select_db('test');

  mysql_query("set names utf8");
  $result = mysql_query("SELECT s1.bookname as book_Name_,
    s1.bookid as book_Id_,
    users.user_Name as user_Name_, s1.date1 as borrow_Data_,s1.date2 as return_Date_ FROM users INNER JOIN (SELECT borrow_records.book_Id as bookid, bookdata.book_Name as bookname,borrow_records.user_Id as id, borrow_records.borrow_Date as date1 ,borrow_records.return_Date as date2 FROM borrow_records INNER JOIN bookdata ON borrow_records.book_Id =bookdata.book_Id) as s1 ON s1.id =users.user_Id");
    ?>


    <div class="books">
      <div class="row">
        <table class="table table-striped">
          <tr>
            <th>user name</th>
            <th>book name</th>
            <th>book id</th>
            <th>borrow Data</th>
            <th>return Data</th>
          </tr>
          <?php
          while($row = mysql_fetch_array($result))
          {
            echo "<tr>";
            echo "<td>" . $row['user_Name_'] . "</td>";
            echo "<td>" . $row['book_Name_'] . "</td>";
            echo "<td>" . $row['book_Id_'] . "</td>";
            echo "<td>" . $row['borrow_Data_'] . "</td>";
            echo "<td>" . $row['return_Date_'] . "</td>";
            echo "</tr>";

          }
          echo "</table></div></div>";

          mysqli_close($con);
          ?>

        </div>
      </body>
      </html>
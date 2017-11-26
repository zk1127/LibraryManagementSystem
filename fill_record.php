<!DOCTYPE html>
<html lang="zh-CN">
<!-- 读者查询界面-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- Bootstrap core CSS -->
  <link href="../css/bootstrap.css" rel="stylesheet">
  <!-- 自定义样式 -->
  <link href="../css/books.css" rel="stylesheet">
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
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
          <li><a href="#" class="user">欢迎，<?php    
          session_start();//开启session
          echo $_SESSION['user'] ?></a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->

    </div>
  </nav>
  <div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
      <li ><a href="logined_bookAdmin.php">Display all</a></li>
      <li><a href="search.php">Search</a></li>
      <li><a href="insert_book.php">Add books</a></li>
      <li><a href="delete_book_by_id.html">Delete books</a></li>
      <li><a href="">Nav item again</a></li>
      <li><a href="">Nav item again</a></li>
      
    </ul>
    <ul class="nav nav-sidebar">
      <li class="active"><a href="fill_record.php">Fill record</a></li>
      <li><a href="">Nav item again</a></li>
      <li><a href="">Nav item again</a></li>
    </ul>
  </div>

  <div class="container">
    <h1>登记借书信息</h1>  
    <form action="fill_record2.php" name="form" method="post" enctype="multipart/form-data">

      <input type="text" name="book_Id" placeholder="book_Id"/>
      <input type="submit" name="submit" value="还书登记" />


    </form>
  </div>

</body>
</html>

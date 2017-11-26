<?php
require("../globle.php");//字符组文件
require("../is_login.php");//检查是否登录
$user_Id_Err = $user_Name_Err = $user_Pw_Err = '';
$user_Id = $user_Name = $user_Pw = '';  
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
        <ul class="nav navbar-nav">
          <li class="active"><a href="#"><?php
          echo $top_nav1; ?></a></li>
          <li><a href="#about"><?php
          echo $top_nav2; ?></a></li>
          <li><a href="#contact"><?php
          echo $top_nav3; ?></a></li>
          <li><a href="#" class="blank"></a></li>
          <li><a href="#"><?php    
          echo $welcome;
          echo $_SESSION['user'];?></a></li>
          <li><a href="../logout.php"><?php
          echo $logout; ?></a></li>
        </ul>
      </div>
      <!--/.nav-collapse -->

    </div>
  </nav>
  <div class="col-sm-3 col-md-2 sidebar">
    <ul class="nav nav-sidebar">
      <li><a href="logined_systemAdmin.php"><?php
      echo $sysAdmin_left_nav1_1; ?></a></li>
      <li><a href="search_user_by_id.php"><?php
      echo $sysAdmin_left_nav1_2; ?></a></li>
      <li class="active"><a href="insert_user.php"><?php
      echo $sysAdmin_left_nav1_3; ?></a></li>
      <li><a href="delete_user_by_id.php"><?php
      echo $sysAdmin_left_nav1_4; ?></a></li>
    </ul>
  </div>

  <div class="container">
    <h1>Insert users</h1>  <br>
    <form class="form-horizontal" role="form" action="insert_user2.php" name="form" method="post">
     <div class="form-group">
       <label class="col-sm-2 control-label">Id</label>
       <div class="col-sm-4">
         <input type="text" class="form-control" name="user_Id" placeholder="user_Id" autofocus="autofocus" />
         <span class="error"></span>
       </div>
     </div>
     <div class="form-group">
      <label class="col-sm-2 control-label">Name</label>
      <div class="col-sm-4">
        <input type="text" name="user_Name" class="form-control" placeholder="user_Name"/>
        <span class="error"> </span>
      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Password</label>
      <div class="col-sm-4">
        <input type="text" name="user_Pw" placeholder="user_Pw" class="form-control"/>
        <span class="error"></span>

      </div>
    </div>
    <div class="form-group">
      <label class="col-sm-2 control-label">Role</label>
      <div class="col-sm-4">
        <select class="form-control" name="role">
          <option value="0">SystemAdmin</option>
          <option value="1">Reader</option>
          <option value="2">BookAdmin</option>
        </select>
      </div>
    </div>
    <div class="form-group">
     <div class="col-sm-offset-2 col-sm-10">
       <input type="submit" name="submit" class="btn btn-primary" value="Insert" />
     </div>
   </div>
 </form>
</div>
</body>
</html>

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
        <?php include"bookAdmin_left_nav_common2.php"; ?>   
        <?php include"bookAdmin_left_nav_common3.php"; ?>  
        <ul class="nav nav-sidebar">
            <li class="active"><a href="#"><?php
            echo $bookAdmin_left_nav4_1; ?></a></li>
            <li><a href="change_information.php"><?php
            echo $bookAdmin_left_nav4_2; ?></a></li>
        </ul>
    </div>

    <div class="container">
        <h1>Change password</h1>  
        <form class="form-horizontal" role="form" action="change_password2.php" name="form" method="post" enctype="multipart/form-data">


          <div class="form-group">
              <label class="col-sm-2 control-label">User Id</label>
              <div class="col-sm-4">
                <input class="form-control" type="text" name="user_Id" placeholder="user_Id" autofocus="autofocus" />
            </div>
        </div>
        
        <div class="form-group">
            <label class="col-sm-2 control-label">Old Password</label>
          <div class="col-sm-4">
            <input class="form-control" type="password" name="user_Pw" placeholder="Old Password"/>
        </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">New Password</label>
      <div class="col-sm-4">
        <input class="form-control" type="password" name="user_Pw1" placeholder="New Password"/>
    </div>
</div>

<div class="form-group">
  <label class="col-sm-2 control-label">New Password Again</label>
  <div class="col-sm-4">
    <input class="form-control" type="password" name="user_Pw2" placeholder="New Password Again"/>
</div>
</div>

<div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
    <input type="submit" name="submit" value="Change password" class="btn btn-primary" />
</div>
</div>

</form>
</div>




</body>
</html>

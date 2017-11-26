<?php
require("../globle.php");//字符组文件
require("../is_login.php");//检查是否登录
require("../MySqlUtils.php");  

$user_Id = $_POST['user_Id'];  
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
    <ul class="nav nav-sidebar">
      <li class="active"><a href="search_forfeit2.php">
        <?php echo $bookAdmin_left_nav3_1; ?></a></li>
        <li><a href="insert_forfeit.php">
          <?php echo $bookAdmin_left_nav3_2; ?></a></li>
        </ul>
        <?php include"bookAdmin_left_nav_common4.php"; ?>  

      </div>

      <div class="container">
        <h1>Show foreit</h1>  
        <form class="form-horizontal" role="form" action="search_forfeit2.php" name="form" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label class="col-sm-2 control-label">User Id</label>
            <div class="col-sm-4">
              <input class="form-control" type="text" name="user_Id" placeholder="user_Id" autofocus="autofocus" value="<?php echo $user_Id; ?>" />
            </div>
          </div>


          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="submit" name="submit" class="btn btn-primary" value="Search" />
            </div>
          </div>


        </form>



        <?php
      





///////////////////////////////检查信息完整

        $isRightForm = checkForm();  



        $link = getLink();  
        if (!$link){  
          echo "<Script>alert('数据库连接失败');</Script>";  
        }  



        $sql = "select * from users WHERE user_Id = ".$user_Id.";";  


        $resoures = getResoures('test', $sql);  
if(!$resoures){  
        echo "<Script>alert('please type into the text box!');</Script>";  
        echo "<Script>window.location.href='search_forfeit.php'</Script>";  
      }  

        $info = mysql_fetch_array($resoures);  


        echo "need to pay：". $info['fine']." yuan";


        closeConnect($link);  





        function checkForm(){  


          global $user_Id ;  
          if (null == $user_Id ){  
            echo "<Script>alert('No id')</Script>";  
            echo "<Script>window.location.href='search_forfeit.php'</Script>";  
             
          }  





          return true;  
        }  


        ?>
      </div>
    </body>
    </html>

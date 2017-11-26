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
    </ul>
    <?php include"bookAdmin_left_nav_common2.php"; ?> 
    <?php include"bookAdmin_left_nav_common3.php"; ?> 
    <?php include"bookAdmin_left_nav_common4.php"; ?> 
  </div>


  <?php

  require("../MySqlUtils.php");  
  header("Content-type:text/html;charset=utf-8"); 


  if ($_SERVER["REQUEST_METHOD"] == "POST")
    $ISBN = $_POST['ISBN']; 



  else
    $ISBN = ''; 

if ($ISBN=='') {
 echo "<Script>alert('please type into the text box!');</Script>";  
        echo "<Script>window.location.href='insert_book_api.php'</Script>";
}



  $url = "https://api.douban.com/v2/book/isbn/:".$ISBN;

  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); //不验证证书
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

    $result = curl_exec($curl);
    curl_close($curl);

    $book_array = (array) json_decode($result, true);

    $book_title = $book_author = $book_publisher = $book_cover = 
    $book_info =$price='';

    if(!empty($book_array["title"])) {


      $book_Name = $book_array["title"];
      $author = $book_array["author"][0];
      $publishing_House = $book_array["publisher"]; 
      $picture = $book_array["image"];
      $book_info = $book_array["summary"]; 
      $ISBN=$book_array['isbn13'];

      if(!empty($book_array['price'])){  $price=$book_array['price'];}
      else{
       $price="25yuan";
     }


     $location ='1';  
     $type = '1';  
     $number = 1;

   }
   ?>
   
   <div class="container">
    <h1>Add Books</h1>  
    
    <form class="form-horizontal" role="form" action="api_transform.php" name="form" method="post">

      <div class="form-group">
        <label class="col-sm-2 control-label">ISBN</label>
        <div class="col-sm-4">
          <input class="form-control" type="text" name="ISBN" placeholder="ISBN" value="<?php echo $ISBN; ?>" />
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Book_Name</label>
        <div class="col-sm-4">
          <input class="form-control" type="text" name="book_Name" placeholder="Book_Name" value="<?php echo $book_Name; ?>"/>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Author</label>
        <div class="col-sm-4">
          <input class="form-control" type="text" name="author" placeholder="Author" value="<?php echo $author; ?>"/>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Publishing_House</label>
        <div class="col-sm-4">
          <input class="form-control" type="text" name="publishing_House" placeholder="Publishing_House" value="<?php echo $publishing_House; ?>"/>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Picture</label>
        <div class="col-sm-4">
          <input class="form-control" type="text" name="picture" placeholder="location" value="<?php echo $picture; ?>"/>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Book_info</label>
        <div class="col-sm-4">
          <input class="form-control" type="text" name="book_info" placeholder="Book_info" value="<?php echo $book_info; ?>"/>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Price</label>
        <div class="col-sm-4">
          <input class="form-control" type="text" name="price" placeholder="location" value="<?php echo $price; ?>"/>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Location-campus</label>
        <div class="col-sm-4">
          <select class="form-control" name="location-campus">
            <option value="友谊校区">友谊校区</option>
            <option value="长安校区">长安校区</option>
          </select>
        </div>
      </div>

      <div class="form-group">
        <label class="col-sm-2 control-label">Location-floor</label>
        <div class="col-sm-4">
          <select class="form-control" name="location-floor">
           <option value="一楼">一楼</option>
           <option value="二楼">二楼</option>
           <option value="三楼">三楼</option>
           <option value="四楼">四楼</option>
           <option value="五楼">五楼</option> 
         </select>
       </div>
     </div>

     <div class="form-group">
      <label class="col-sm-2 control-label">location</label>
      <div class="col-sm-4">
        <select class="form-control" name="location">
         <option value="A区">A区</option>
         <option value="B区">B区</option>
         <option value="C区">C区</option>
         <option value="D区">D区</option>  
         <option value="E区">E区</option>
         <option value="F区">F区</option>
       </select>
     </div>
   </div>

   <div class="form-group">
    <label class="col-sm-2 control-label">Type</label>
    <div class="col-sm-4">
      <select class="form-control" name="type">
        <option value="文学艺术">文学艺术</option>
        <option value="数理科学">数理科学</option>
        <option value="社科">社科</option>
        <option value="物理">物理</option>
        <option value="管理">管理</option>  
        <option value="天文">天文</option>
        <option value="政治经济">政治经济</option>
        <option value="历史">历史</option>
        <option value="文学">文学</option>
      </select>
    </div>
  </div>

  <div class="form-group">
    <label class="col-sm-2 control-label">Amount</label>
    <div class="col-sm-4">
      <input class="form-control" type="text" name="number" placeholder="number " />
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
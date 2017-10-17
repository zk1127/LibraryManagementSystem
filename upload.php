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
<h1>Login</h1>  
 <form action="upload.php" name="form" method="post" enctype="multipart/form-data">
  <input type="file" name="file" />
  <input type="submit" name="submit" value="上传" />
</form>
</div>


<?php
$file = $_FILES['file'];//得到传输的数据
//得到文件名称
$name = $file['name'];
$type = strtolower(substr($name,strrpos($name,'.')+1)); //得到文件类型，并且都转化成小写
$allow_type = array('jpg','jpeg','gif','png'); //定义允许上传的类型
//判断文件类型是否被允许上传
if(!in_array($type, $allow_type)){
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
if(move_uploaded_file($file['tmp_name'],$upload_path.$file['name'])){
  echo "Successfully!";
}else{
  echo "Failed!";
}


  ?>

  </body>
</html>

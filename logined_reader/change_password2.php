 <?php
require("../is_login.php");//检查是否登录
require("../MySqlUtils.php");  
header("Content-type:text/html;charset=utf-8");  


$user_Id = $_SESSION['user'];  
$user_Pw = $_POST['user_Pw']; 
$user_Pw1 = $_POST['user_Pw1'];  
$user_Pw2 = $_POST['user_Pw2'];   
///////////////////////////////检查信息完整
// $isRightForm = checkForm();  


///////////////////////////////////
///信息添加
///
$isRight = checkPw();  
if ($isRight==1){  


 if($user_Pw1!=null){
  if($user_Pw1==$user_Pw2 ){

    $isRightInsert = changePw();  
    if ($isRightInsert){  
      echo "<Script>alert('update the password successfully')</Script>";  
      echo "<Script>window.location.href='change_password.php'</Script>";  
    }else{  
      echo "<Script>alert('fail to update the password!')</Script>";  
      echo "<Script>window.location.href='change_password.php'</Script>";  
    }  
  }
  else{echo "<Script>alert('The new passwords are different!')</Script>";  
  echo "<Script>window.location.href='change_password.php'</Script>";

} 



}else
{  
  echo "<Script>alert('Please input the new password')</Script>";  
  echo "<Script>window.location.href='change_password.php'</Script>";  
}  

}else{  
  echo "<Script>alert('Wrong password!')</Script>";  
  echo "<Script>window.location.href='change_password.php'</Script>";  
}  

function checkPw(){           

  global $user_Id;  
  global $user_Pw;  
  
  if (!getlink()){  
    echo "<Script>alert('fail to connect to the database');</Script>";  
    return false;  
  }  


  $sql = "select * from users WHERE user_Id = ".$user_Id.";";  

  $resoures = getResoures('test', $sql);
       // if(!$resoures)

  $info = mysql_fetch_array($resoures);   
  if(!$info){  
    echo "<Script>alert('wrong user id!');</Script>"; 
    echo "<Script>window.location.href='change_password.php'</Script>";   

  }  
  else
  {

   $passw=$info['user_Pw'];

   closeConnect($link); 

   if($passw==$user_Pw){
     return 1;
   }else{
    return 0;
   }

 }


}  

function changePw(){  


  global $user_Id;  
  global $user_Pw2;  

  $link = getLink();  
  if ('0' == $link){  
    echo "<Script>alert('fail to connect to the database');</Script>";  
    return false;  
  }  

  $sql = "UPDATE users SET user_Pw = ".$user_Pw2." WHERE user_Id = ".$user_Id.";";  

  $isRightInsert = getResoures('test', $sql);  

  closeConnect($link);  
  return $isRightInsert;  
}  



?>
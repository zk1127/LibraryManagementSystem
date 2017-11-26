<?php
require("../MySqlUtils.php");  

$link=getlink();
$sql = "select role from users WHERE user_Id = ".$_SESSION['user']
.";";  

$resoures = getResoures('test', $sql);
$info = mysql_fetch_array($resoures);   
if($info == ''){
	echo "<Script>alert('Error')</Script>";   
	echo "<Script>window.location.href='../login.html'</Script>";   

}
else if($info != 2){
	echo "<Script>alert('You have no right to see this webpage')</Script>";   
	echo "<Script>window.location.href='../login.html'</Script>";   
}
closeConnect($link);
?>
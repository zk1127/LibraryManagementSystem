<?php
header("Content-type:text/html;charset=utf-8");  

$con = mysqli_connect('127.0.0.1','root','','test',3306);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db('test');

mysql_query("set names utf8");
$result = mysql_query("SELECT * FROM users");



echo "<table >
<tr>
<th>id</th>
<th>name</th>
<th>role</th>

</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['user_Id'] . "</td>";
  echo "<td>" . $row['user_Name'] . "</td>";
  if($row['role']==0)echo "<td>系统管理员</td>";
    else if($row['role']==2)echo "<td>图书管理员</td>";
      else echo "<td>普通用户</td>";


  echo "</tr>";




  }
echo "</table>";

mysqli_close($con);
?>
<?php
header("Content-type:text/html;charset=utf-8");  

$con = mysqli_connect('127.0.0.1','root','','test',3306);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db('test');

mysql_query("set names utf8");
$result = mysql_query("SELECT * FROM bookdata");



echo "<table >
<tr>
<th>id</th>
<th>name</th>
<th>location</th>
<th>ISBN</th>
<th>author</th>
<th>press</th>
<th>is borrowed?</th>
<th>pcn</th>
<th>type</th>

</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['book_Id'] . "</td>";
  echo "<td>" . $row['book_Name'] . "</td>";
  echo "<td>" . $row['location'] . "</td>";
  echo "<td>" . $row['ISBN'] . "</td>";
  echo "<td>" . $row['author'] . "</td>";
  echo "<td>" . $row['publishing_House'] . "</td>";

  if($row['is_Borrow']==1)echo "<td>YES<td>";
  else echo "<td>NO<td>";

  echo "<td><img src='../library/Pic/" . $row['picture'] . "'/></td>"; 
  echo "<td>" . $row['type'] . "</td>";

  echo "</tr>";




  }
echo "</table>";

mysqli_close($con);
?>
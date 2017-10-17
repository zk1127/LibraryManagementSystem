<?php
header("Content-type:text/html;charset=utf-8");  

$con = mysqli_connect('127.0.0.1','root','','test',3306);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db('test');

mysql_query("set names utf8");
$result = mysql_query("SELECT s1.bookname as book_Name_,
  s1.bookid as book_Id_,
  users.user_Name as user_Name_, s1.date1 as borrow_Data_,s1.date2 as return_Date_ FROM users INNER JOIN (SELECT borrow_records.book_Id as bookid, bookdata.book_Name as bookname,borrow_records.user_Id as id, borrow_records.borrow_Date as date1 ,borrow_records.return_Date as date2 FROM borrow_records INNER JOIN bookdata ON borrow_records.book_Id =bookdata.book_Id) as s1 ON s1.id =users.user_Id");



echo "<table >
<tr>


<th>user Name</th>
<th>book name</th>
<th>book id</th>
<th>borrow Data</th>
<th>return Data</th>
</tr>";

while($row = mysql_fetch_array($result))
  {
  echo "<tr>";
  echo "<td>" . $row['user_Name_'] . "</td>";
  echo "<td>" . $row['book_Name_'] . "</td>";
    echo "<td>" . $row['book_Id_'] . "</td>";
  echo "<td>" . $row['borrow_Data_'] . "</td>";
  echo "<td>" . $row['return_Date_'] . "</td>";
  echo "</tr>";

  }
echo "</table>";

mysqli_close($con);
?>
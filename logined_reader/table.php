<?php

require("../is_login.php");//检查是否登录

if(!isset($_SESSION['user']))
{
  echo "<Script>alert('Please login');</Script>";
  echo "<Script>window.location.href='../login.html'</Script>";
}

header("Content-type:text/html;charset=utf-8");  

$con = mysqli_connect('127.0.0.1','root','','test',3306);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db('test');

mysql_query("set names utf8");
$result = mysql_query("SELECT DISTINCT b.book_Name as name,sq.count_b as cb,b.ISBN as isbn,b.author as atr,b.publishing_House as ph,b.picture as pci,b.type as tp,b.location as lc FROM bookdata b JOIN ( SELECT `book_Name`, COUNT(`book_Name`)as count_b FROM bookdata WHERE is_Borrow = 0 GROUP BY book_Name ) AS sq WHERE b.book_Name = sq.book_Name");



echo "<table >
<tr>
<th></th>
<th>name</th>
<th>remain</th>
<th>ISBN</th>
<th>author</th>
<th>press</th>
<th>pcn</th>
<th>type</th>
<th>location</th>
</tr>";

while($row = mysql_fetch_array($result))
  {

    echo "<form action='detail_info.php' name='form' method='post'>";
  echo "<tr>";

 // $book_Name=$row['name'];
  
$book_Name= $row['name'];

  

  echo "<td><input type='text' name='book_Name' style='visibility:hidden' value='" . $row['name'] . "'/></td>";
echo "<td>" . $row['name'] . "</td>";
  echo "<td>" . $row['cb'] . "</td>";
  echo "<td>" . $row['isbn'] . "</td>";
  echo "<td>" . $row['atr'] . "</td>";
  echo "<td>" . $row['ph'] . "</td>";


if(strpos($row['pci'],'ps')!=false){
  echo "<td><img src='" . $row['pci'] . "'/></td>";

}else{
    echo "<td><img src='Pic/" . $row['pci'] . "'/></td>";
}


   
  echo "<td>" . $row['tp'] . "</td>";
  echo "<td>" . $row['lc'] . "</td>";
echo "<td><input type='submit' value='More Information' /></td>";
  echo "</tr>";

                echo "</form>";



  }
echo "</table>";

mysqli_close($con);
?>
<?php
if(!session_id()) session_start();//开启session
if(!isset($_SESSION['user']))
{
	echo "<Script>alert('Please login');</Script>";
	echo "<Script>window.location.href='../login.html'</Script>";
}
?>
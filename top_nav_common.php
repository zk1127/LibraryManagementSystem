<?php
echo'<ul class="nav navbar-nav">

<li class="active"><a href="#">';
echo $top_nav1; echo'</a></li>
<li><a href="#about">';
echo $top_nav2; echo'</a></li>
<li><a href="#contact">';
echo $top_nav3; echo'</a></li>
<li><a href="#" class="blank"></a></li>
<li><a href="#">';
echo $welcome;echo $_SESSION['user'];echo'</a></li>
<li><a href="../logout.php">';
echo $logout; echo'</a></li>

</ul>';

?>
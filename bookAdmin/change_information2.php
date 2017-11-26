<?php
require("../is_login.php");//检查是否登录
require("../MySqlUtils.php");  
header("Content-type:text/html;charset=utf-8");  


    $info = $_POST['info'];  
 


   $isRightInsert = insertBook();  
    if ($isRightInsert){  
        echo "<Script>alert('Change successfully')</Script>";  
        echo "<Script>window.location.href='change_information.php'</Script>";  
    }else{  
        echo "<Script>alert('Change failed!')</Script>";  
       echo "<Script>window.location.href='change_information.php'</Script>";  
    }  



    function insertBook(){  
         

    global $info; 


        $link = getLink();  
        if ('0' == $link){  
            echo "<Script>alert('数据库连接失败');</Script>";  
            return false;  
        }  

    

        $sql = "UPDATE information SET info ='".$info."' WHERE id = 1; ";


        $isRightInsert = getResoures('test', $sql);  

        closeConnect($link);  
        return $isRightInsert;  
    }  



  ?>

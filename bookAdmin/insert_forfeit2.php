<?php

require("../is_login.php");//检查是否登录
require("../MySqlUtils.php");  
header("Content-type:text/html;charset=utf-8");  


$user_Id = $_POST['user_Id'];  
$fine = $_POST['fine'];  
///////////////////////////////检查信息完整
$isRightForm = checkForm();  


///////////////////////////////////
///信息添加
///


$isRightInsert = insertBook();  
if ($isRightInsert){  
    echo "<Script>alert('Insert successfully')</Script>";  
    echo "<Script>window.location.href='insert_forfeit.php'</Script>";  
}else{  
    echo "<Script>alert('Insert failed!')</Script>";  
    echo "<Script>window.location.href='insert_forfeit.php'</Script>";  
}  


function checkForm(){  


    global $user_Id ;  
    if (null == $user_Id ){  
        echo "<Script>alert('用户id不能为空')</Script>";  
        echo "<Script>window.location.href='insert_forfeit.php'</Script>";  
    }  

    global $fine;  
    if (null == $fine){  
        echo "<Script>alert('罚金不能为空')</Script>";  
        echo "<Script>window.location.href='insert_forfeit.php'</Script>";  
        return false;  
    }  




    return true;  
}  

function insertBook(){  


    global $user_Id;  
    global $fine;  

    $link = getLink();  
    if ('0' == $link){  
        echo "<Script>alert('数据库连接失败');</Script>";  
        return false;  
    }  


    $sql = "UPDATE users SET fine = ".$fine." WHERE user_Id = ".$user_Id.";";  



    $isRightInsert = getResoures('test', $sql);  

    closeConnect($link);  
    return $isRightInsert;  
}  


?>
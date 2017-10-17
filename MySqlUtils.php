<?php  
  
    function getLink(){  

         $link=mysqli_connect('127.0.0.1','root','','test',3306)or die('  
            连接数据路失败,请检查后重试!');  
        if (!$link) {  
            echo "连接失败1";  
            return '0';  
        }else{  
            return $link;  
        }  
    }  
  
    function getResoures($DBName, $sql){  
        try{  
            $db_select = mysql_select_db($DBName);  
            if (!$db_select) {  
                echo "连接失败2";  
                //return '0';  
            }  
            $resoures = mysql_query($sql);  
            return $resoures;  
        }catch(Exception $e){  
            echo 'Caught exception: ',  $e->getMessage(), "\n";  
            //return '1'.$e->getMessage();  
        }  
    }  
  
    function closeConnect($link){  
        if (null != $link) {  
            mysqli_close($link);  
        }  
    }  
?>  
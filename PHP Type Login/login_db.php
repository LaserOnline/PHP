<?php

//--------------------------------------------------------------------------------------------------------------------
require ('condb.php'); 
//--------------------------------------------------------------------------------------------------------------------

//--------------------------------------------------------------------------------------------------------------------
$stu_username =  mysqli_real_escape_string ($condb,$_POST['stu_username']);
$stu_password =  mysqli_real_escape_string ($condb,$_POST['stu_password']);
//--------------------------------------------------------------------------------------------------------------------

$key = 'd23j08dj23dj23rjdihj32239ru29sdfsd';  
$has_password = hash_hmac('md5', $stu_password, $key);  

//$sql = "SELECT * FROM student WHERE stu_username = '".$stu_username."' AND stu_password = '".$stu_password."' ";

$sql = "SELECT * FROM student WHERE stu_username=? AND stu_password=? ";
$stmt = mysqli_prepare ($condb, $sql);
mysqli_stmt_bind_param ($stmt, "ss", $stu_username, $has_password);
mysqli_execute ($stmt);



//--------------------------------------------------------------------------------------------------------------------
//$result = mysqli_query($condb,$sql);
//$show = mysqli_fetch_array($result);
$show = mysqli_stmt_get_result ($stmt);
//--------------------------------------------------------------------------------------------------------------------
    if ($show->num_rows ==1)
    {
        session_start();
        $se_user = mysqli_fetch_array ($show,MYSQLI_ASSOC);
        $_SESSION ['stu_id'] = $se_user ['stu_id'];
        header ("Location: index.php");
    } else 
    {
        echo "<script type='text/javascript'>";
        echo "alert('Username หรือ Password ไม่ถูกต้อง')";
        echo "</script>";    
    }
//--------------------------------------------------------------------------------------------------------------------


?>
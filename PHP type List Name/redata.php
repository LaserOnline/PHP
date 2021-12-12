<?php

require ('mysql.php');

/*echo '<per>';
print_r($_GET);
echo '</per>';

echo '<hr>';

echo '<per>';
var_dump($_GET);
echo '</per>';     

exit;*/

$fname = $_GET["fname"];
$lname = $_GET["lname"];
$id    = $_GET['id'];

$sql = "UPDATE mydata SET fname='$fname',lname='$lname' WHERE id = $id ";

$result =  mysqli_query($condb,$sql);

mysqli_close($condb);

/*echo $sql;

echo '<hr>';*/

    if($result)
    {   
        echo "คุณได้แก้ไขข้อมูลแล้ว";
    }else{
        echo mysqli_errno($condb);
    }
?>
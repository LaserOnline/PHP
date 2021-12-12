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

$id= $_GET['id'];

$sql = "DELETE FROM  mydata WHERE id = $id ";

$result =  mysqli_query($condb,$sql);

mysqli_close($condb);

/*echo $sql;

echo '<hr>';*/

    if($result)
    {   
        echo "ลบแล้ว";
    }else{
        echo mysqli_error($condb);
    }
?>
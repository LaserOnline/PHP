<?php

require ('mysql.php');

$fname = $_GET["fname"];
$lname = $_GET["lname"];

$sql = "INSERT INTO mydata(fname,lname) VALUES('$fname','$lname')";

$result =  mysqli_query($condb,$sql);

    if($result){
        echo "บันทึกข้อมูลแล้ว";
    }else{
        echo mysqli_errno($condb);
    }
?>
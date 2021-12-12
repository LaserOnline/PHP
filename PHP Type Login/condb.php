<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "0969514044";
    $dbname     = "studentdata";

    $condb = mysqli_connect($servername, $username,$password,$dbname);

    /*if (!$condb){
        die("Connect Failed".mysqli_connect_errno());
    }else{
        echo "connect Ok";
    }*/
?>
<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "mydatabase";

    $condb = mysqli_connect($servername, $username,$password,$dbname);

    /*if (!$condb){
        die("Connect Failed".mysqli_connect_errno());
    }else{
        echo "connect Ok";
    }*/
?>
<?php
    
    session_start();

    if (!isset($_SESSION['stu_id']))
    {
        header ('location: login.html');
    }

        require 'condb.php';

        $username_id = $_SESSION['stu_id'];

        $sql = "SELECT * FROM student WHERE stu_id= '$username_id' ";

        $query = mysqli_query($condb,$sql);

            if ($query)
            {

                $show = mysqli_fetch_array ($query,MYSQLI_ASSOC);
                $stu_fname = $show['stu_fname'];
                $stu_lname = $show['stu_lname'];
                $stu_email = $show['stu_email'];

                mysqli_free_result($query);

            }
        mysqli_close($condb);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    
</head>
<body>

<h1>ทดสอบ</h1>

    <?php
    
    echo "รหัสสมาชิก:".$_SESSION['stu_id'];
    echo "<br>";
    echo "ชื่อ:$stu_fname นามสกุล:$stu_lname อีเมล:$stu_email";
    
    ?>

    <a href="logout.php">ออกจากระบบนะจ๊ะ</a>
    
</body>
</html>
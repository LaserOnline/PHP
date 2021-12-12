<?php

require ('condb.php'); 

// 
$errors = array(); //    <-------------- ถ้าหากมีข้อมูลในตาราง


//-----------------------------------------------
// รับค่ามาจาก หน้าสมัคร
$stu_username = ($_POST["stu_username"]);
$stu_password = ($_POST["stu_password"]);
$stu_password1 = ($_POST["stu_password1"]);
$stu_fname = ($_POST["stu_fname"]);
$stu_lname = ($_POST["stu_lname"]);
$stu_phone = ($_POST["stu_phone"]);
$stu_email = ($_POST["stu_email"]);
//-----------------------------------------------

    //------------------------------------------------------------
        //       ค้นในตารางทั้งหมด  จาก  student  แถวชื่อ          ตัว PHPรับค่ามาเช็คว่า Username กับ Eamil ตรงกันหรือไม

        
        
        //$user_query = "SELECT * FROM student WHERE stu_username = '".$stu_username."' OR stu_email = '".$stu_email."'";
        //$query = mysqli_query($condb, $user_query);
    $sql = "SELECT * FROM student WHERE stu_username = '".$stu_username."' OR stu_email = '".$stu_email."'";
    $query = mysqli_query($condb, $sql);
    $check_u = mysqli_fetch_array($query);

    $key = 'd23j08dj23dj23rjdihj32239ru29sdfsd';  

    $has_password = hash_hmac('md5', $stu_password, $key);  

    
    if ($check_u)

    {
    if ($check_u['stu_username'] = "$stu_username")
        {
            array_push($errors,"");   
            echo "<script type='text/javascript'>";
            echo "alert('ID ซ้ำ!!!')";
            echo "</script>";          
    }
    
    if ($check_u['stu_email'] = "$stu_email")
        {
            array_push($errors,"");    // <---------- ถ้าหากมีข้อมูลใน database ให้ push ออก
            echo "<script type='text/javascript'>";
            echo "alert('Emaill ซ้ำ!!!')";
            echo "</script>"; 
            }
        }
           
                if ($stu_password != $stu_password1 )
                {
                    array_push($errors,"");
                    echo "<script type='text/javascript'>";
                    echo "alert('รหัสผ่านของคุณไม่ตรงกัน')";
                    echo "</script>"; 
                }

            // ID กับ Email ไม่ตรงกัน ให้ทำการ เก็บข้อมูลลงใน database
            if (count($errors) == 0)
            {
                $add = "INSERT INTO student (stu_username, stu_password, stu_fname, stu_lname, stu_phone, stu_email) 
                VALUES('$stu_username', '$has_password', '$stu_fname', '$stu_lname', '$stu_phone', '$stu_email')"; 
                mysqli_query($condb,$add);
                header('location: login.html');
            }


?>
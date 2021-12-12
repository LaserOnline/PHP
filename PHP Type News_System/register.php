<?php

require ('secure/condb.php'); 

// 
$errors = array(); //    <-------------- ถ้าหากมีข้อมูลในตาราง


//-----------------------------------------------
// รับค่ามาจาก หน้าสมัคร
$login_username = ($_POST["login_username"]);
$login_password = ($_POST["login_password"]);
$login_password1 = ($_POST["login_password1"]);
$login_email	= ($_POST["login_email"]);
//-----------------------------------------------

    //------------------------------------------------------------
        //       ค้นในตารางทั้งหมด  จาก  student  แถวชื่อ          ตัว PHPรับค่ามาเช็คว่า Username กับ Eamil ตรงกันหรือไม

        //$user_query = "SELECT * FROM student WHERE stu_username = '".$stu_username."' OR stu_email = '".$stu_email."'";
        //$query = mysqli_query($condb, $user_query);
    $sql = "SELECT * FROM tblogin WHERE login_username = '".$login_username."' OR login_email = '".$login_email."'";
    $query = mysqli_query($condb,$sql);
    $check_u = mysqli_fetch_array($query);

    $key = 'd23j08dj23dj23rjdihj32239ru29sdfsd';  

    $has_password = hash_hmac('md5', $login_password, $key);  

    
    if ($check_u)

    {
    if ($check_u['login_username'] = "$login_username")
        {
            array_push($errors,"");   
            echo "<script type='text/javascript'>";
            echo "alert('ID ซ้ำ!!!')";
            echo "</script>";          
        }
    
    if ($check_u['login_password'] = "$login_password")
        {
            array_push($errors,"");    // <---------- ถ้าหากมีข้อมูลใน database ให้ push ออก
            echo "<script type='text/javascript'>";
            echo "alert('Emaill ซ้ำ!!!')";
            echo "</script>"; 
        }
    }
           
                if ($login_password != $login_password1 )
                {
                    array_push($errors,"");
                    echo "<script type='text/javascript'>";
                    echo "alert('รหัสผ่านของคุณไม่ตรงกัน')";
                    echo "</script>"; 
                }
            
            // ID กับ Email ไม่ตรงกัน ให้ทำการ เก็บข้อมูลลงใน database
            if (count($errors) == 0) 
            {
            $add = "INSERT INTO tblogin (login_username,login_password,login_email) VALUES ('$login_username','$has_password','$login_email')";
                mysqli_query($condb,$add);
                header('location: success.php?code=1');
             }else
              {
                echo "เกิดข้อผิดพลาด " .mysqli_error($condb);
            }


?>
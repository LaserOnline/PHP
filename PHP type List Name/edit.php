<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="dx.css">
    <title>แก้ไข</title>
</head>
<body>
     <?php
          require ('mysql.php');

               $id = $_GET['id'];
               $sql ="SELECT * FROM mydata WHERE id=$id";       
               $result =mysqli_query($condb,$sql);
               $row = mysqli_fetch_array($result);
             
     ?>
       <h2>แก้ไขข้อมูล</h2>

       <h3><?php if ($id!=''){echo " สถานะ = แก้ไขข้อมูล";}else{echo "สถานะ = เพิ่มข้อมูล";}?></h3>

            <form action="redata.php" method="$_GET">
                 <div>
                 <label for="">Your ID</label>
                 <input type="text" name="id" id="" value="<?php echo $row['id'];?>" readonly>
                 </div>
                <div>
                     <label for="">ชื่อจริง</label>
                     <input type="text" name="fname" id="" value="<?php echo $row['fname'];?>">
                </div>
                <div>
                     <label for="">นามสกุล</label>
                     <input type="text" name="lname" id="" value="<?php echo $row['lname'];?>">
                </div>
                <input type="submit" value="ยืนยัน">
            </form>
            
       <a href="showdata.php">ดูรายชื่อ</a>  
</html>
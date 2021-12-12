<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>บันทึกข้อมูล</title>
    <link rel="stylesheet" href="dx.css">
</head>
<body >
       <h2>แบบฟอร์มบันทึกข้อมูล</h2>
            <form action="data.php" method="$_GET">
                <div>
                     <label for="">ชื่อจริง</label>
                     <input type="text" name="fname" id="">
                </div>
                <div>
                     <label for="">นามสกุล</label>
                     <input type="text" name="lname" id="">
                </div>
                <input type="submit" value="ยืนยัน">
            </form>
       <a href="showdata.php">ดูรายชื่อ</a>  
</body>
</html>
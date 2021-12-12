<?php require ('mysql.php');?>


<h2>แสดงรายชื่อ</h2>
 
<form method="$_GET" id="from" enctype="multipart/form-data" action="">
    <strong>ค้นหาข้อมูล</strong>
    <input type="text" name="search" size="30" value="">
    <input type="submit" value="ค้นหาข้อมูล">
</form>

<table border="1" cellpadding='3' cellspacing='0'>

    <tr>
        <td>ลำดับ</td>
        <td>ชื่อ</td>
        <td>นามสกุล</td>
        <td>แก้ไข</td>
        <td>ลบ</td>
    </tr>

    <div>
            <a href="inser.php">ย้อนกลับ</a>
    </div>

<?php

$search=isset($_GET['search']) ? $_GET['search']:'';
$sql="SELECT * FROM mydata WHERE fname LIKE '%$search%'"; 
$reuslt = $condb ->query($sql);

    while($re =$reuslt->fetch_object())
    {
?>

    <tr>
        <td><?=$re->id;?></td>
        <td><?=$re->fname;?></td>
        <td><?=$re->lname;?></td>
        <td><a href="edit.php?id=<?=$re->id;?>">Edit</a></td>
        <td><a href="delete.php?id=<?=$re->id;?>"onclick="return confirm('คุณแน่ใจ');">Delete</a></td>
    </tr>
        
    
<?php } ?>

</table>


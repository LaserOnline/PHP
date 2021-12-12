<?php

    include 'session.php';
    require ('condb.php');

    $sql = "SELECT * FROM tbnews INNER JOIN tbnewstype ON tbnews.newstype_id = tbnewstype.newstype_id ORDER BY news_id DESC";
    $res_news = mysqli_query($condb,$sql);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../lightbox/css/lightbox.min.css" rel="stylesheet">
    <title>Admin</title>
</head>
<body>
    <h1>Admin</h1>
        <p>คุณ<?php echo $login_username; ?> อีเมล <?php echo $login_email; ?></p>
    <h2>เมนูหลัก</h2>    
    <p>
        <a href="frome_news.php">เพิ่มข่าวนะจ๊ะ</a>
    </p>
    <br>

    <table border="5px">
        <tr>
            <td>รหัสข่าว</td>
            <td>หัวข้อข่าว</td>
            <td>สถานะ</td>
            <td>วันที่ประกาศ</td>
            <td>ไฟล์แนบ</td>
            <td>ประเภทข่าว</td>
            <td>แก้ไข</td>
            <td>ลบข่าว</td>
        </tr>
        <?php
                while ($row_news = mysqli_fetch_assoc($res_news)) {
        ?>
        <tr>
            <td><?php echo $row_news ['news_id'];?></td>
            <td><?php echo $row_news ['news_topic'];?></td>
            <td><?php
            if ($row_news['news_status'] == 0)
            {
                echo 'ข่าวปกติ';
            }else
            {
                echo 'ข่าวเด่น';
            }             
            ?></td>
            <td><?php echo $row_news ['news_data'];?></td>
            <td><a data-lightbox="<?php echo $row_news['news_filename'] ; ?>" data-title="<?php echo $row_news['news_filename'] ; ?>" href="../image/<?php echo $row_news['news_filename'] ; ?>"><?php echo $row_news['news_filename'] ; ?></a></td>
            <td><?php echo $row_news ['newstype_detail'];?></td>
            <td><a href="form_update.php?id=<?=$row_news ['news_id'];?>">Edit</a></td>
            <td><a href="delete.php?id=<?=$row_news ['news_id'];?>"onclick="return confirm('คุณแน่ใจ');">Delete</a></td>
        </tr>
           
        <?php }
        
        ?>

    </table>

    <hr>
    <a href="logout.php">ออกจากระบบ</a>
    <script src="../js/jquery.js"></script>
    <script src="../lightbox/js/lightbox.min.js"></script>
</body>
</html>

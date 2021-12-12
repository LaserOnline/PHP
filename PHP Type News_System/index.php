
<?php

    session_start(); //? รับค่ามาจาก ไฟล ชื่อ Session.php ถ้าล็อกอินไม่ใช่ admin ให้มาหน้านี้ เป็นหน้าของผู้ใช้ ปกติ 

    if (!isset($_SESSION['is_member']))
    {
        header("Location: success.php?code=2");
    }   

    require ('secure/condb.php'); //? รับค่าเชือมต่อ จากไฟล์ condb.php และตัวแปล ชื่อ condb
   
    $sql = "SELECT * FROM tbnews INNER JOIN tbnewstype ON tbnews.newstype_id = tbnewstype.newstype_id ORDER BY news_id DESC LIMIT 2 ";
    $res_news = mysqli_query($condb,$sql); //? จะทำการติดต่อ ฐานข้อมูล จากที่เราได้เขียนใน บรรทที่ 6 ให้ค้นหาข้อมูล ใน ตาราง tbnews และ ดึง ข้อมูล 
                                           //? ร่วมกัน 2 ตาราง
                                         
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/uikit.css" />
    <link href="../lightbox/css/lightbox.min.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/uikit.min.js"></script>  
    
</head>
<body>

<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom"> <!-- div 1 -->
        
        <?php include 'header.php'; ?> <!-- //? จากไฟล์ header.php -->
        
            <div class="uk-grid" data-uk-grid-margin> <!-- div 2-->

                <div class="uk-width-medium-3-4"> <!-- div 3 -->
                <?php
                        while ($row_news = mysqli_fetch_assoc($res_news)) 
                        { //เปงการสร้างลูป while ทีละแถว
                ?>
                    
                    <article class="uk-article"> 

                    <h1 class="uk-article-title">
                        <a href="#"><?php echo $row_news['news_topic']; ?></a>
                    </h1>        

                        <p class="uk-article-meta">ประเภท <?php echo $row_news ['newstype_detail'];?> <?php echo $row_news['news_data']; ?></p> 
                        <!-- //? โชว์ ส่วน เวลาที่อัพโหลด กับ ประเภทข่าว -->

                        <p>
                            <a href="#"><img class="uk-thumbnail uk-thumbnail-large uk-align-center" src="./image/<?php echo $row_news['news_filename'];?>" alt=""></a>
                            <!-- //? แสดงรูปภาพ -->
                        </p>
                        
                        <?php echo $row_news['news_detail']; ?>   
                            <!-- //? แสดงข้อความของข่าว-->

                            </article>

                        <?php } ?> 
                    
                </div> <!-- div 3 -->

                <?php include 'right.php'; ?> <!-- //? จากไฟล์ right.php -->
            
                

            </div> <!-- div 2-->

    </div> <!-- div 1 -->

        <?php  include 'rs.php'; ?> <!-- //? จากไฟล์ rs.php -->

</body>
</html>
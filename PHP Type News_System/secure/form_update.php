<?php
    require ('condb.php');
    $news_id = $_GET['id'];
    $sql ="SELECT * FROM tbnews WHERE news_id= '$news_id' ";   //? <----- ดึงข้อมูลเฉพราะ มีรหัสข่าว ที่รับมาจาก news_id
    $update_query = mysqli_query($condb,$sql); 
    $row_update = mysqli_fetch_assoc($update_query); //? ดึงข้อมูลมาเก็บไว้ใน ตัวแปล $row_news
?>
 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        label{       
            display: block;
        }
    </style>
    <script src="../ckeditor/ckeditor.js"></script>
    <title>แก้ไขข่าว</title>
</head>
<body>
       
       
        <h4>แก้ไขรายละเอียดข่าว รหัส <?php echo $news_id?></h4>
        
            <form id="form1" action="edit.php" method="POST" enctype="multipart/form-data">
                   
            <label for="newstype">เลือกประเภทข่าว</label>
                <select name="newstype">
                                       
                    <?php
                        $sql_news = "SELECT * FROM tbnewstype";
                        $query_news = mysqli_query($condb,$sql_news);
                            while ($row_news = mysqli_fetch_assoc($query_news))
                            {
                                if ($row_news['newstype_id'] == $row_update['newstype_id'])
                                {
                                    echo '<option value="'.$row_news['newstype_id'].'" selected>'.$row_news['newstype_detail'].'</option>' ;
                                } else
                                {
                                    echo '<option value="'.$row_news['newstype_id'].'">'.$row_news['newstype_detail'].'</option>' ;
                                }
                            }
                    ?>
                    
                </select>
                
                <label for="news_topic">หัวข้อข่าว</label>             
                <input type="text" name="news_topic" value="<?php echo $row_update['news_topic']; ?>" require size ="40">   
                  
                <label for="news_detail">เนื้อหาข่าว</label>
                <textarea name="news_detail" id="news_detail" rows="10" cols="80" >
                    <?php echo $row_update ['news_detail'];?>          
                </textarea>

                <script>
                CKEDITOR.replace( 'news_detail', {
                    language: 'th',
                    uiColor: '#9AB8F3'
                });
                </script>     

                <br>       
                <img src="../image/<?php echo $row_update ['news_filename']; ?>" width="150px" height="150px"> 

                <label for="news_filename">ภาพประกาศข่าว</label>
                <input type="file" name ="news_filename">

                <label for="news_status">สถานะข่าว</label>

                <?php
                    if ($row_update ['news_status'] == 0 )
                    {
                        echo '<input type="radio" value="0" checked name="news_status" > ข่าวทั่วไป <br>'; 
                        echo '<input type="radio" name="news_status" value="1"> ข่าวเด่น <br>';                 
                    }else
                    {
                        echo '<input type="radio" value="0"  name="news_status" > ข่าวทั่วไป <br>'; 
                        echo '<input type="radio" name="news_status" value="1" checked > ข่าวเด่น <br>';   
                    }
                ?>


                <input type="hidden" name="news_id" value="<?php echo $row_update ['news_id']?>">
                <br>
                <input type="submit" value="บันทึก">
               
            </form>
                
</body>
</html>
                        
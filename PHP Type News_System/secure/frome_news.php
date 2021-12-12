<?php
    require ('condb.php');
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
    <title>AddNews</title>
</head>
<body>
       

            <form id="form1" action="insert_news.php" method="POST" enctype="multipart/form-data">
                   
            <label for="newstype">เลือกประเภทข่าว</label>
                <select name="newstype">
                    
                    <option value="">--กรุณาเลือกประเภทข่าว--</option>
                    <?php
                        $sql_news = "SELECT * FROM tbnewstype";
                        $query_news = mysqli_query($condb,$sql_news);
                            while ($row_news = mysqli_fetch_assoc($query_news))
                            {
                                echo '<option value="'.$row_news['newstype_id'].'">'.$row_news['newstype_detail'].'</option>' ;
                            }
                    ?>
                    
                </select>
                
                <label for="news_topic">หัวข้อข่าว</label>
                <input type="text" name="news_topic" require>   
                  
                <label for="news_detail">เนื้อหาข่าว</label>
                <textarea name="news_detail" id="news_detail" rows="10" cols="80" >

                </textarea>

                <script>
                CKEDITOR.replace( 'news_detail', {
                    language: 'th',
                    uiColor: '#9AB8F3'
                });
                </script>           

                <label for="news_filename">ภาพประกาศข่าว</label>
                <input type="file" name ="news_filename">

                <label for="news_status">สถานะข่าว</label>
                <input type="radio" value="0" checked name="news_status" > ข่าวทั่วไป <br>
                <input type="radio" name="news_status" value="1"> ข่าวเด่น <br>
 
                
                <input type="submit" value="บันทึก">

            </form>

</body>
</html>
                        
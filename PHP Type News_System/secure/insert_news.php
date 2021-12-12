<?php
    require ('condb.php'); 

    $newstype_id = $_POST['newstype'];
    $news_topic = $_POST['news_topic'];
    $news_detail = $_POST['news_detail'];
    $news_status = $_POST['news_status'];

    //? อัพโหลดรูป

    $image_ext = pathinfo(basename($_FILES['news_filename'] ['name']),PATHINFO_EXTENSION);
    $new_image_name = 'news_'.uniqid().".".$image_ext;
    $image_path = "../image/";
    $image_upload_path = $image_path.$new_image_name;
    $success = move_uploaded_file($_FILES['news_filename']['tmp_name'],$image_upload_path);

        if ($success==false)
        {
            echo "ไม่สามารถอัพโหลดไฟล์ ได้";
            exit();
        }

        $sql = "INSERT INTO tbnews (news_topic, news_detail, news_filename, news_status, news_data, newstype_id) 
        VALUES ('$news_topic','$news_detail','$new_image_name','$news_status',NOW(),'$newstype_id')"; 

 

    $result = mysqli_query($condb,$sql);

    if ($result)
    {
        //echo "บันทึกข้อมูลเสร็จสิ้น";
        header("Location: main.php");
    }else
    {
        echo "เกิดข้อผิดพลาด". mysqli_error($condb);
    }
        
    


?>














//?  เว้น ตรง  ' $new_image_name',


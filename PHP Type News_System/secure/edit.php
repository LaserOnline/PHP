<?php
    require ('condb.php'); 

    $news_id = $_POST['news_id'];
    $newstype_id = $_POST['newstype'];
    $news_topic = $_POST['news_topic'];
    $news_detail = $_POST['news_detail'];
    $news_status = $_POST['news_status'];

                                    //?  อัพเดท รูปภาพ

    if (is_uploaded_file($_FILES['news_filename']['tmp_name']))  //! <--- ถ้าอัพโหลดไฟล์ จริง ให้ทำในเงื่อนไข
    {

        $sql_upimage = "SELECT news_filename FROM tbnews WHERE news_id='$news_id' ";
        $res_select = mysqli_query($condb, $sql_upimage);
        $news_image = mysqli_fetch_row($res_select);
        $filename_old = $news_image[0];

        unlink('../image/'.$filename_old);              

        $image_ext = pathinfo(basename($_FILES['news_filename'] ['name']),PATHINFO_EXTENSION);
        $new_image_name = 'news_'.uniqid().".".$image_ext;
        $image_path = "../image/";
        $image_upload_path = $image_path.$new_image_name;
        $success = move_uploaded_file($_FILES['news_filename']['tmp_name'],$image_upload_path);

        $sql_image = "UPDATE tbnews SET news_filename='$new_image_name' WHERE news_id='$news_id' ";
        mysqli_query($condb, $sql_image);

        if ($success==false)
        {
            echo "ไม่สามารถอัพโหลดไฟล์ ได้";
            exit();
        }
    }

    
        


    $sql = "UPDATE tbnews SET news_topic='$news_topic', news_detail='$news_detail', news_status='$news_status', news_data=NOW(), newstype_id='$newstype_id' ";
    $sql .= "WHERE news_id='$news_id' ";
 

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


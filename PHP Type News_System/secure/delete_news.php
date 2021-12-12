<?php

require ('condb.php');


$news_id = $_GET['id'];

$sql_select = "SELECT news_filename FROM tbnews WHERE news_id='$news_id' ";
$res_select = mysqli_query($condb, $sql_select);
$news_image = mysqli_fetch_row($res_select);
$filename = $news_image[0];

unlink('../image/'.$filename);

$sql_delete = "DELETE FROM  tbnews WHERE news_id = $news_id ";
$result =  mysqli_query($condb,$sql_delete);

mysqli_close($condb);


    if($result)
    {   
        header ('location: main.php');
    }else{
        echo mysqli_error($condb);
    }
?>
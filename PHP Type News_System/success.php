
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/uikit.css" />
    <script src="js/jquery.js"></script>
    <script src="js/uikit.min.js"></script>
</head>
<body>

<script src="//cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>

    <div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
        
        <?php
        
            include 'header.php';

        ?>

            <div class="uk-grid" data-uk-grid-margin>

                <div class="uk-width-medium-3-4">

                    <?php
                        if ($_GET['code'] == 1) 
                        {
                            echo '<div class="uk-alert uk-alert-success"> สมัครสมาชิกเสร็จสิ้น </div>';
                        }          
                    ?>

                <?php
                    if ($_GET['code'] == 2) {
                    
                    ?>
                    <div class="uk-alert uk-alert-danger"> หน้านี้สำหรับสมาชิกเท่านั้น โปรดลงทะเบียน </div>'; 
                    
                <?php }
                  ?>

                </div>

                <?php
                
                    include 'right.php';
                
                ?>

            </div>

    </div>

        <div id="offcanvas" class="uk-offcanvas">
            <div class="uk-offcanvas-bar">
                <ul class="uk-nav uk-nav-offcanvas">
                <li>
                        <a href="index.php">หน้าแรก</a>
                    </li>
                    <li>
                    </li>         
                    <li>
                        <a href="layouts_contact.html">ติดต่อได้แต่ไม่รับ</a>
                    </li>

                    <li>
                        <a href="from_register.php">เข้าสู่ระบบ</a>
                    </li>
                </ul>
            </div>
        </div>

</body>
</html>
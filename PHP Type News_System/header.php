<nav class="uk-navbar uk-margin-large-bottom">
            <a class="uk-navbar-brand uk-hidden-small" href="layouts_frontpage.html">ThaiHub</a>
                <ul class="uk-navbar-nav uk-hidden-small">

                    <li>
                        <a href="index.php">หน้าแรก</a>
                    </li>

                    <li>
                        <a href="user.php">ข่าวทั้งหมด</a>
                    </li>  

                    <li>
                        <a href="layouts_contact.html">ติดต่อได้แต่ไม่รับ</a>
                    </li>

                    <?php
                        if (isset($_SESSION['is_member']))
                        {              
                    ?>

                    <li>
                        <a href="secure/login.html">ออกจากระบบ</a>
                    </li>

                    <?php }else { ?>

                    <li>
                        <a href="secure/login.html">เข้าสู่ระบบ</a>
                    </li>

                    <li>
                        <a href="secure/register.html">สมัคร</a>
                    </li>
                    
                    <?php } ?>

                </ul>
            <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas></a>
    <div class="uk-navbar-brand uk-navbar-center uk-visible-small">ThaiHub</div>
    
        </nav>
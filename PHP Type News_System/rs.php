<div id="offcanvas" class="uk-offcanvas">
    <div class="uk-offcanvas-bar">
        <ul class="uk-nav uk-nav-offcanvas">

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

    </div>
</div>
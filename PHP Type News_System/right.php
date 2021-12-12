<div class="uk-width-medium-1-4">

<?php
    if (isset($_SESSION['is_member'])) //? ค่า SESSION ได้รับจาก ล็อกอิน ถ้าใช้  is_member หรือ = 0 ให้ทำด้านล่าง
    { // ! (ขอบเขตของ IF ถึง ตั้งแต่ 5 จน 17 { )
?>

    <div class="uk-uk-panel">

        <h2 class="uk-uk-panel-title">ข้อมูลสมาชิก</h2>
            <p>
                ยินดีต้อนรับ <?php echo $_SESSION['login_username']; ?>  <!-- //? แสดง ID ของผู้ที่ล็อกอินมา ได้รับมาจาก Session -->
                
            </p>
    </div>

<?php } ?>  <!-- //! จบคำสั่ง IF } -->

    <?php
        $sqlnews = "SELECT * FROM tbnewstype" ;        //! $sqlnews = กำหนด ให้ค้นหา ใน ตาราง ทั้งหมด ของ tbnewstype
        $res_newstype = mysqli_query($condb,$sqlnews); //! $res_newstype ทำการ query หรือ รับคำสั่งจาก line 20 ให้ทำ ตามนั้น  
    ?>


    <div class="uk-panel">

        <h3 class="uk-panel-title">หมวดข่าว</h3>
        <ul class="uk-list uk-list-line">

        <?php 
            while ($row_newstype = mysqli_fetch_assoc($res_newstype)){ //! { (ขอบเขต ของคำสั่งนี้ จะมี ถึง ตั้งแต่ 31 ถึง 38 )  
            //? ทำการลูปหน้าข่าว เพื่อให้แสดง ข่าวทั้งหมด ถ้ามี ข่าวใหม่ ก็จะมาทันที่ ไม่ต้อง ใส่หน้าข่าวใหม่ 
        ?>

        <li><a href="news.php?newstype_id= <?php echo $row_newstype ['newstype_id'];?> "> <?php echo $row_newstype ['newstype_detail'];?> </a></li>
            <!-- //! line 35 จะแสดง หมวดหมู่ของข่าว และส่ง id ค่าไปยัง ไฟล์ news.php เพื่อรับค่า ของข่าว ว่าเป็น หมวดข่าว อะไร -->
        
            <?php }?> <!-- //! (จบคำสั่ง ลูป While } ตรงนี้)  -->

        </ul>

    </div>
    
</div>
<?php
    
    session_start();

    if (!isset($_SESSION['is_admin']))
    {
        header ('location: login.html');
    }
        require 'condb.php';

        $username_id = $_SESSION['login_id'];

        $sql = "SELECT * FROM tblogin WHERE login_id = '$username_id' ";

        $query = mysqli_query($condb,$sql);

            if ($query)
            {

                $show = mysqli_fetch_array ($query,MYSQLI_ASSOC);
                $login_username = $show['login_username'];
                $login_email = $show['login_email'];

                mysqli_free_result($query);

            }

        mysqli_close($condb);

?>
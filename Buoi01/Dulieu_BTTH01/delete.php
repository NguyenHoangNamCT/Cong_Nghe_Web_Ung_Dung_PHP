<?php
    $link = mysqli_connect('localhost', 'root', 'vertrigo');
    mysqli_select_db($link, 'qlsv_cnw');
    if(isset($_GET['id'])){
        $sTruyVan = 'DELETE FROM sinhvien WHERE id = ' . $_GET['id'];
        if(mysqli_query($link, $sTruyVan))
            header("location:index.php");
    }
?>
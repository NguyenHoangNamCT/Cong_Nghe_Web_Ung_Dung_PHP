<?php
    session_start();//chỉ cần start 1 lần ở index vì đã chỉnh trong vertrigo là session.autoStart=1 rồi.
    header("location:admin/ktnguoidung");
?>
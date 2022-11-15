<?php
    require("../../model/database.php");
    require("../../model/nguoidung.php");

    $isLogin = isset($_SESSION['nguoiDung']);

    if(isset($_REQUEST['action']))
        $action = $_REQUEST['action'];
    else if(!$isLogin)
        $action = 'dangNhap';
    else
        $action = 'macDinh';
    
    $nd = new NGUOIDUNG();
    switch($action){
        case 'macDinh':
            include('main.php');
            break;
        case 'dangNhap':
            include('loginform.php');
            break;
        case 'xuLyDangNhap':
            $email = $_POST['txtEmail'];
            $matKhau = $_POST['txtPassword'];
            if($nd->kiemTraNguoiDungHopLe($email, $matKhau)){
                $_SESSION['nguoiDung'] = $nd->layMotNguoiDung($email);
                include('main.php');
            }
            else
                include('loginform.php');
            break;
        case 'dangXuat':
            unset($_SESSION['nguoiDung']);
            include('loginform.php');
            break;
        case 'capNhatHoSoCaNhan':
            $email = $_POST['txtEmail'];
            $soDienThoai = $_POST['txtDienThoai'];
            $hoTen = $_POST['txtHoTen'];
            $hinhAnh = $_POST['txtHinhCu'];

            if($_FILES['fileHinhCapNhat']['name'] != ""){
                $hinhAnh = $_FILES['fileHinhCapNhat']['name'];
                move_uploaded_file($_FILES['fileHinhCapNhat']['tmp_name'], '../../images/'.$hinhAnh);
            }

            $nd->capNhatHoSo($email, $hoTen, $soDienThoai, $hinhAnh);
            $_SESSION['nguoiDung'] = $nd->layMotNguoiDung($email);
            include("main.php");
            break;
        default:
            break;
    }
?>

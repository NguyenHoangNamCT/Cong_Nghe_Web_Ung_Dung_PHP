<?php
    require('../../model/database.php');
    require('../../model/nguoidung.php');
    if(isset($_REQUEST['action']))
        $action = $_REQUEST['action'];
    else
        $action = 'macDinh';

    $nd = new NGUOIDUNG();

    switch($action){
        case 'macDinh':
            include('main.php');
            break;
        case 'themNguoiDung':
            $email = $_POST['txtEmail'];
            $ten = $_POST['txtHoTen'];
            $dienThoai = $_POST['txtDienThoai'];
            $matKhau = $_POST['txtMatKhau'];
            $quyen = $_POST['selectLoai'];
            // var_dump($email, $ten, $dienThoai, $matKhau, $quyen);

            $nd->themnguoidung($email, $ten, $dienThoai, $matKhau, $quyen);

            include('main.php');
            break;
        case 'xoa':
            $id = $_GET['id'];

            if($_GET['quyen'] != 3 && isset($_GET['quyen'])){
                $idNguoiDungKhongDuocPhepXoa = $id;
                $idXoaNguoiDung = $id;
            }
            else
                $nd->xoaNguoiDung($id);
            include('main.php');
            break;
        case 'thayDoiTrangThai':
            $id = $_GET['id'];
            $trangThai = $_GET['trangThai'];
            $nd->thayDoiTrangThaiNguoiDung($id, $trangThai);
            include('main.php');
            break;
        default:
            break;
    }
?>
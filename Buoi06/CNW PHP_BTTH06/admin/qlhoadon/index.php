<?php 
if(!isset($_SESSION["nguoidung"])){
    header("location:../index.php");
}
require("../../model/database.php");
require("../../model/donhang.php");
require("../../model/chitiethoadon.php");
require("../../model/diachi.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$hoaDon = new DONHANG();
$diaChi = new DIACHI();
$idSua = 0;

switch($action){
    case "xem":
		include("main.php");
        break;
    case "xoa":
        if(isset($_GET['id']))
            $hoaDonId = $_GET['id'];
        $hoaDon->xoaDonHang($hoaDonId);
        include("main.php");
        break;
    case "sua":
        if(isset($_GET['id']))
            $idSua = $_GET['id'];
        include("main.php");
        break;
    case "xuLySua":
        if(isset($_POST['inputDiaChi']) && isset($_POST['inputTongTien']) && isset($_POST['donHangId']) && isset($_POST['nguoiDungId'])){
            $diaChiMoi = $_POST['inputDiaChi'];
            $tongTienMoi = $_POST['inputTongTien'];
            $donHangId = $_POST['donHangId'];
            $nguoiDungId = $_POST['nguoiDungId'];
        }
        $hoaDon->capNhatTongTienCuaDonHangTheoId($donHangId, $tongTienMoi);
        $diaChi->suaDiaChiTheoNguoiDungId($nguoiDungId, $diaChiMoi);
        $idSua = 0;
        include("main.php");
        break;
    default:
        break;
}
?>
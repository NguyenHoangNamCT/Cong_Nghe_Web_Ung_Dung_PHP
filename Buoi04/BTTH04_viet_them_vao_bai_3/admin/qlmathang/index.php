<?php
if(!isset($_SESSION['nguoiDung']))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/mathang.php");
require("../../model/danhmuc.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$idSua = 0;
$mh = new MATHANG();

switch($action){
    case "xem":
        include("main.php");
        break;
    case "them":
        $dm = new DANHMUC();
        $mangDanhMuc = $dm->laydanhmuc();
        include("add.php");
        break;
    case "xuLyThem":
        //upload hình ảnh
        //var_dump(($_FILES['fileHinhAnh']));
        //var_dump(($_FILES['fileHinhAnh']['name']));
        //var_dump(basename($_FILES['fileHinhAnh']['name']));dòng này và dòng trên không có gì khác

        //$_FILES['fileHinhAnh'] trả về một mảng
        // $hinhAnh = "images/".basename($_FILES['fileHinhAnh']['name']);
        $hinhAnh = "images/".$_FILES['fileHinhAnh']['name'];//name là tên file được chọn
        
        // $duongDan = "../../".$hinhAnh;
        // var_dump(move_uploaded_file($_FILES['fileHinhAnh']['tmp_name'], $duongDan)); trả về true false, phương thức này không cần dùng trong trường hợp này

        // thực hiện thêm
        $tenMatHang = $_POST['txtTenMatHang'];
        $giaBan = $_POST['txtGiaBan'];
        $moTa = $_POST['txtMoTa'];
        $danhMucID = $_POST['selectDanhMuc'];
        $mh->themMatHang($tenMatHang, $moTa, $giaBan, $hinhAnh, $danhMucID);
        include("main.php");
        break;
    case "xoa":
        $mh->xoaMatHang($_GET['id']);
        include("main.php");
        break;
    case "sua":
        $idSua = $_GET['id'];
        include('main.php');
        break;
    case "xuLySua":
        if(isset($_POST["txtCapNhatTenMatHang"]) && isset($_POST['txtCapNhatGiaBan'])&& isset($_POST['selectCapNhatDanhMuc']) && isset($_POST['id'])){
            $tenHangCapNhat = $_POST["txtCapNhatTenMatHang"];
            $giaBanCapNhat = $_POST['txtCapNhatGiaBan'];
            $danhMucCapNhat = $_POST['selectCapNhatDanhMuc'];
            $idMH = $_POST['id'];

            if($_FILES['fileCapNhat']['name'] != '')//nếu người dùng không chọn thì sẽ trả về '';
            {
                var_dump($tenHangCapNhat);
                var_dump($giaBanCapNhat);
                var_dump($danhMucCapNhat);
                var_dump($idMH);
                var_dump($_FILES['fileCapNhat']['name']);
                $hinhAnhCapNhat = 'images/'.$_FILES['fileCapNhat']['name'];
                $mh->suaMatHang($idMH, $tenHangCapNhat, $giaBanCapNhat, $danhMucCapNhat, $hinhAnhCapNhat);
            }
            else
                $mh->suaMatHang($idMH, $tenHangCapNhat, $giaBanCapNhat, $danhMucCapNhat);

        }
        include('main.php');
        break;
    default:
        break;
}
?>

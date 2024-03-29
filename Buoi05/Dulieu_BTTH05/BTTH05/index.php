<?php 
require("model/database.php");
require("model/danhmuc.php");
require("model/mathang.php");
require("model/giohang.php");

$dm = new DANHMUC();
$mh = new MATHANG();
$danhmuc = $dm->laydanhmuc();

if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="macdinh"; 
}

$mathangnoibat = $mh->laymathangnoibat();

switch($action){
    case "macdinh":
        $soLuongMatHang = $mh->demTongSoMatHang();
        $soMatHangTrongMotTrang = 3;
        $soTrang = ceil($soLuongMatHang/$soMatHangTrongMotTrang);

        //nếu không chọn trang nào thì tự chọn trang đầu
        if(isset($_GET['trangDuocChon']))
            $trangDuocChon = $_GET['trangDuocChon'];
        else
            $trangDuocChon = 1;

        $batDau = ($trangDuocChon - 1)*$soMatHangTrongMotTrang;
        $mathang = $mh->layMatHangPhanTrangCoTenDanhMuc($batDau, $soMatHangTrongMotTrang);
        include("main.php");
        break;
    case "xemnhom": 
        if(isset($_REQUEST["madm"])){
            $madm = $_REQUEST["madm"];
            $dmuc = $dm->laydanhmuctheoid($madm);
            $tendm =  $dmuc["tendanhmuc"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("group.php");
        }
        else{
            include("main.php");
        }
        break;
    case "xemchitiet":
        if(isset($_GET["mahang"])){
            $mahang = $_GET["mahang"];
            // tăng lượt xem lên 1
            $mh->tangluotxem($mahang);
            // lấy thông tin chi tiết mặt hàng
            $mhct = $mh->laymathangtheoid($mahang);
            // lấy các mặt hàng cùng danh mục
            $madm = $mhct["danhmuc_id"];
            $mathang = $mh->laymathangtheodanhmuc($madm);
            include("detail.php");
        }
        break;
    case 'xemGioHang':
        include('cart.php');
        break;
    case "choVaoGio":
        if(isset($_REQUEST['id']))
            $matHangID = $_REQUEST['id'];
        if(isset($_REQUEST['soLuong']))
            $soLuong = $_REQUEST['soLuong'];

        $SPDaCoTrongGioHang = false;

        //Nếu đã tồn tại trong giỏ hàng thì cập nhật số lượng
        for($i = 0; $i < count($_SESSION['gioHang']); $i++){
            if($_SESSION['gioHang'][$i]['id'] == $matHangID){
                $_SESSION['gioHang'][$i]['soLuong'] += $soLuong;
                $SPDaCoTrongGioHang = true;
                break;
            }
        }

        if(!$SPDaCoTrongGioHang)
            themHangVaoGio($matHangID, $soLuong);
        include('cart.php');
        break;
    case "capNhatGioHang":
        echo '<br><br><br><br>';
        //cập nhật lại số lượng trong giỏ hàng, và xoá những mặt hàng có số lượng là 0
        for($i = 0; $i < count($_SESSION['gioHang']); $i++){
            if(isset($_REQUEST['txtSLCuaID'.$_SESSION['gioHang'][$i]['id']])){
                $_SESSION['gioHang'][$i]['soLuong'] = $_REQUEST['txtSLCuaID'.$_SESSION['gioHang'][$i]['id']];
            }
            if($_SESSION['gioHang'][$i]['soLuong'] <= 0)
                xoaSPKhoiGioHangTheoID($_SESSION['gioHang'][$i]['id']);                
        }
        include('cart.php');
        break;
    case "xoaSPKhoiGioHang":
        if(isset($_GET['chiSo']))
        {
            $mhID = $_GET['chiSo'];
            xoaSPKhoiGioHangTheoID($mhID);
        }
        include('cart.php');
        break;
    default:
        var_dump($action);
        break;
}
?>
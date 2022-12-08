<?php 
require("model/database.php");
require("model/danhmuc.php");
require("model/mathang.php");
require("model/giohang.php");
require("model/khachhang.php");
require("model/diachi.php");
require("model/donhang.php");
require("model/chiTietHoaDon.php");


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
		$soluong = 4; // mỗi trang hiển thị $soluong mẫu tin
		$tongmathang = $mh->demtongsomathang(); // tổng số mẫu tin hiện có
		$tongsotrang = ceil($tongmathang/$soluong);	// tổng số trang
		if(isset($_REQUEST["trang"]))
			$tranghh = $_REQUEST["trang"];
		else
			$tranghh = 1;
		$batdau = ($tranghh - 1) * $soluong; // mẫu tin bắt đầu sẽ lấy
        $mathang = $mh->laymathangphantrang($batdau, $soluong);
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
    case "chovaogio":
		$id = $_REQUEST["id"];
		$soluong = $_REQUEST["soluong"];
		// nếu hàng đã có trong giỏ thì tăng thêm số lượng
		if (kiemtramathang($id)){
			tangsoluong($id, $soluong);
		}
		else{
		// chưa có thì thêm mới
			themhangvaogio($id, $soluong);
		}
		$giohang = laygiohang();
		include("cart.php");
		break;
	case "xemgiohang":		
		$giohang = laygiohang();
		include("cart.php");
		break;
	case "xoagiohang":	
		xoagiohang();
		$giohang = laygiohang();
		include("cart.php");
		break;
	case "capnhatgiohang":	
		if(isset($_REQUEST["mh"])){
			$mh = $_REQUEST["mh"];
			foreach($mh as $mahang=>$soluong){
				if($soluong > 0)
					capnhatsoluong($mahang, $soluong);
				else
					xoamotmathang($mahang);
			}
		}
		$giohang = laygiohang();
		include("cart.php");
		break;
	case "thanhToan":
		include("checkOut.php");
		break;
	case "xuLyThanhToan";
		$email = $_POST['inputEmail'];
		$hoTen = $_POST['inputHoTen'];
		$sdt = $_POST['inputSDT'];
		$diaChi = $_POST['inputDiaChi'];
		$kh = new KHACHHANG();
		$DiaChi = new DIACHI();
		$donHang = new DONHANG();
		$chiTietHoaDon = new CHITIETHOADON();
		//thêm người dùng mới và lưu id của người dùng đó vào biến idKHMoi
		$idKHMoi = $kh->themKhachHang($email, $hoTen, $sdt);
		//thêm địa chỉ mới
		$DiaChi->themDiaChi($diaChi, $idKHMoi);
		//thêm đơn hàng mới
		$tongTien = tinhtiengiohang();
		$hoaDonId = $donHang->themDonHang($idKHMoi, $tongTien, '');
		//thêm các chi tiết vào đơn hàng
		$gioHang = laygiohang();
		foreach($gioHang as $maMH => $thongTinMH)
			$chiTietHoaDon->themChiTietHoaDon($hoaDonId, $maMH, $thongTinMH['giaban'], $thongTinMH['soluong']);
		xoagiohang();
		include("thanks.php");
		break;
    default:
        break;
}
?>
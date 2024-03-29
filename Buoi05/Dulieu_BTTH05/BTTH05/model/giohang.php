<?php
// Tạo mảng SESSION giohang rỗng nếu nó không tồn tại
if (!isset($_SESSION['gioHang']) ) {
    $_SESSION['gioHang'] = array();
}

function themHangVaoGio($MHID, $soLuong)
{
    $mh = new MATHANG();
    $mangMatHang = $mh->laymathangtheoid($MHID);
    //thêm key soLuong có giá trị là biến $soLuong vào mảng mangMatHang
    $mangMatHang['soLuong'] = $soLuong;
    //thêm mảng mặt hàng, vào mảng mảng mặt hàng. (mảng đa chiều)
    $_SESSION['gioHang'][] = $mangMatHang; 
}

function demSoSPTrongGio()
{
    $mangSanPhamTrongGio = $_SESSION['gioHang'];
    $sum = 0;
    foreach($mangSanPhamTrongGio as $arr)
        $sum += $arr['soLuong'];
    return $sum;
}

function xoaSPKhoiGioHangTheoID($id)
{
    for($i = 0; $i < count($_SESSION['gioHang']); $i++){
        if($_SESSION['gioHang'][$i]['id'] == $id)
            \array_splice($_SESSION['gioHang'], $i, 1);
    }
}

// function FunctionName(Type $var = null)
// {
//     # code...
// }

// // Hàm thêm sản phẩm vào giỏ (không hiểu)
// function themhangvaogio($mahang, $soluong) {
//     //Tạo thể hiện của lớp MATHANG
//     $mh_db = new MATHANG();
//     //Cập nhập Số lượng vào SESSION - Làm tròn
//     $_SESSION['giohang'][$mahang] = round($soluong, 0);
//     //Lấy thông tin của sản phẩm dựa vào $mahang
//     $mh = $mh_db->laymathangtheoid($mahang);
//     //Cập nhật thông tin của Mã danh mục và Tên danh mục vào mảng SESSION
//     $_SESSION['madm_cuoi'] = $mh['danhmuc_id'];
//     $_SESSION['tendm_cuoi'] = $mh['tendanhmuc'];
// }

// Cập nhật số lượng của giỏ hàng
// function capnhatsoluong($mahang, $soluong) {
//     if (isset($_SESSION['giohang'][$mahang])) {
//         $_SESSION['giohang'][$mahang] = round($soluong, 0);
//     }
// }

// Xóa một sản phẩm trong giỏ hàng
// function xoamotmathang($mahang) {
//     if (isset($_SESSION['giohang'][$mahang])) {
//         unset($_SESSION['giohang'][$mahang]);
//     }
// }

// function layGioHang(Type $var = null)
// {
//     # code...
// }

// Hàm lấy mảng các sản phẩm trong giohang
// function laygiohang() {
	
//     //Tạo mảng rỗng để lưu danh sách sản phẩm trong giỏ
//     $mh = array();
//     $mh_db = new MATHANG();
    
//     //Duyệt mảng SESSION giohang và lấy từng id sản phẩm cùng số lượng
//     foreach ($_SESSION['giohang'] as $mahang => $soluong ) {
//         // Gọi hàm lấy thông tin của sản phẩm theo mã sản phẩm
//         $m = $mh_db->laymathangtheoid($mahang);
//         $dongia = $m['giaban'];
//         $solg = intval($soluong);        
//         // Tính tiền
//         $sotien = round($dongia * $soluong, 2);

//         // Lưu thông tin trong mảng items để hiển thị lên giỏ hàng
//         $mh[$mahang]['tenhang'] = $m['tenmathang'];
//         $mh[$mahang]['giaban'] = $dongia;
//         $mh[$mahang]['soluong'] = $solg;
//         $mh[$mahang]['sotien'] = $sotien;
//     }
//     return $mh;
// }

// Đếm số sản phẩm trong giỏ hàng
// function demhangtronggio() {
//     return count($_SESSION['giohang']);
// }

// // Đếm tổng số lượng các sản phẩm trong giỏ
// function demsoluongtronggio() {
//     $tongsl = 0;
// 	//Lấy mảng các sản phẩm từ trong SESSION
//     $giohang = laygiohang();
//     foreach ($giohang as $item) {
//         $tongsl += $item['soluong'];
//     }
//     return $tongsl;
// }

// Tính tổng thành tiền trong giỏ hàng
// function tinhtiengiohang () {
//     $tong = 0;
//     $giohang = laygiohang();
//     foreach ($giohang as $mh) {
//         $tong += $mh['giaban'] * $mh['soluong'];
//     }
//     return $tong;
// }

// Xóa tất cả giỏ hàng
function xoagiohang() {
    $_SESSION['giohang'] = array();
}

?>
<?php 
class CHITIETHOADON{
    public function themChiTietHoaDon($donHangId, $matHangId, $donGia, $soLuong)
    {
        $thanhTien = $donGia * $soLuong;
        $db = DATABASE::connect();
        try{
            $sql = 'INSERT INTO `donhangct`(`donhang_id`, `mathang_id`, `dongia`, `soluong`, `thanhtien`) VALUES (:donHangId,:mhId, '.$donGia.', '.$soLuong.', '.$thanhTien.')';
            $cmd = $db->prepare($sql);
            $cmd->bindvalue(':donHangId', $donHangId);
            $cmd->bindvalue(':mhId', $matHangId);
            // $cmd->bindvalue(':donGia', $donGia);
            // $cmd->bindvalue(':soLuong', $soLuong);
            // $cmd->bindvalue('thanhTien:', $donGia * $soLuong);
            return $cmd->execute();
        }
        catch(PDOException $e){
            echo '<p>Lỗi truy vấn ở themChiTietHoaDon: '.$e->getMessage().'</p>';
            exit(); 
        }
    }

    public function xoaChiTietHoaDonTheoMaHoaDon($donHangId)
    {
        $db = DATABASE::connect();
        try{
            $sql = "DELETE FROM donhangct where donhang_id = :donHangId";
            $cmd = $db->prepare($sql);
            $cmd->bindvalue(":donHangId", $donHangId);
            return $cmd->execute();
        }
        catch(PDOException $e){
            echo "<p>Lỗi truy vấn ở phương thức xoaChiTietHoaDonTheoMaHoaDon: ".$e->getMessage()."</p>";
            exit();
        }
    }
}
?>
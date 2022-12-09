<?php 
class DONHANG{
    public function themDonHang($nguoiDungId, $tongTien, $ghiChu)
    {
        $db = DATABASE::connect();
        try{
            $sql = 'INSERT INTO donhang(`nguoidung_id`, `ngay`, `tongtien`, `ghichu`) VALUES (:nguoiDungId, :ngay, :tongTien, :ghiChu)';
            $cmd = $db->prepare($sql);
            $cmd->bindvalue(':nguoiDungId', $nguoiDungId);
            $cmd->bindvalue(':tongTien', $tongTien);
            $cmd->bindvalue(':ghiChu', $ghiChu);
            $cmd->bindvalue(':ngay', date("Y-m-d h:i:s", time()));
            $cmd->execute();
            return $db->lastInsertId();
        }
        catch(PDOException $e){
            echo '<p>Lỗi truy vấn: '.$e->getMessage().'</p>';
            exit();
        }
    }

    public function layDonHang(){
        $dbcon = DATABASE::connect();
        try{
            $sql = "SELECT dh.*, nd.hoten FROM donhang dh, nguoidung nd WHERE dh.nguoidung_id = nd.id";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    public function xoaDonHang($donHangId)
    {
        $cthd = new CHITIETHOADON();
        $cthd->xoaChiTietHoaDonTheoMaHoaDon($donHangId);
        $db = DATABASE::connect();
        try{
            $sql = "DELETE FROM donhang where id = :donHangId";
            $cmd = $db->prepare($sql);
            $cmd->bindvalue(":donHangId", $donHangId);
            return $cmd->execute();
        }
        catch(PDOException $e){
            echo "<p>Lỗi truy vấn ở phương thức xoaDonHang: ".$e->getMessage()."</p>";
            exit();
        }
    }

    public function capNhatTongTienCuaDonHangTheoId($id, $tongTienUpdate)
    {
        $db = DATABASE::connect();
        try{
            $sql = "UPDATE `donhang` SET `tongtien`=$tongTienUpdate WHERE id = :id";
            $cmd = $db->prepare($sql);
            $cmd->bindvalue(':id', $id);
            $cmd->execute();
            return $db->lastInsertId();
        }
        catch(PDOException $e){
            echo '<p>Lỗi truy vấn: '.$e->getMessage().'</p>';
            exit();
        }
    }
}
?>
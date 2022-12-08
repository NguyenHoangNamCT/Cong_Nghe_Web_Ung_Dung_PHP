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
}
?>
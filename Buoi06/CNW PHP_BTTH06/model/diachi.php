<?php 
class DIACHI{
    public function themDiaChi($diaChi, $nguoiDungID)
    {
        $db = DATABASE::connect();
        try{
            $sql = 'INSERT INTO diachi(nguoidung_id, diachi) VALUES (:nguoiDungID, :diaChi)';
            $cmd = $db->prepare($sql);
            $cmd->bindvalue(':nguoiDungID', $nguoiDungID);
            $cmd->bindvalue(':diaChi', $diaChi);
            return $cmd->execute();
        }
        catch(PDOException $e){
            echo '<p>Lỗi truy vấn: '.$e->getMessage().'</p>';
            exit(); 
        }
    }
}
?>
<?php 
class MatHang{
    private $id, $tenMatHang, $moTa, $giaGoc, $giaBan, $soLuongTon, $danhMucID, $hinhanh, $luotXem, $luotMua;
    //lấ mặt hàng
    public function layMatHang(){
        $db = DATABASE::connect();
        try{
            $sql = "select * from mathang";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    
    //lay mat hang va danh muc
    public function layMatHangVaDanhMuc(){
        $db = DATABASE::connect();
        try{
            $sql = "select mh.*, dm.tendanhmuc from mathang mh, danhmuc dm where mh.danhmuc_id = dm.id";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        }
        catch(PDOException $e){
            echo "<p>".$e->getMessage()."</p>";
            exit();
        }
    }
    

    //Lay mat hang theo danh muc
    public function layMatHangTheoDanhMuc($danhMucID){
        $db = DATABASE::connect();
        try{
            $sql = "select * from mathang where danhmuc_id = :dmID";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":dmID", $danhMucID);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        }
        catch(PDOException $e){
            echo "<p>Lỗi truy vấn: ".$e->getMessage()."</p>";
            exit();
        }
    }

    //Lay mot mat hang theo id
    public function layMotMatHangTheoID($idMatHang){
        $db = DATABASE::connect();
        try{
            $sql = "select * from mathang where id = :idMH";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":idMH", $idMatHang);
            $cmd->execute();
            $result = $cmd->fetch();//vì chỉ trả về một hàng nên chỉ gọi là fetch thoi
            return $result;
        }
        catch(PDOException $e){
            echo "<p> Lỗi truy vấn: ".$e->getMessage()."</p>";
            exit();
        }
    }

    //tăng lượt xem lên một
    public function tangLuotXem($id){
        $db = DATABASE::connect();
        try{
            $sql = "Update mathang Set luotxem=luotxem+1 where id=:id";
            $cmd = $db->prepare($sql);
            $cmd->bindvalue(":id", $id);
            $result = $cmd->execute();
            return $result;
        }catch(PDOException $e){
            echo "<p> Lỗi truy vấn: ".$e->getMessage()."</p>";
            exit();
        }
    }

    // //Lấy 5 sản phẩm có lượt xem cao nhất //câu truy vấn bên sql server sài bình thường mà bên đây không chạy
    // public function sanPhamNoiBat(){
    //     $db = DATABASE::connect();
    //     try{
    //         $sql = "SELECT DISTINCT TOP 5 *
    //         FROM mathang
    //         ORDER BY luotxem DESC";
    //         $cmd = $db->prepare($sql);
    //         $cmd->execute();
    //         $result = $cmd->fetchAll();
    //         return $result;
    //     }
    //     catch(PDOException $e){
    //         $sLoi = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $sLoi</p>";
    //         exit();
    //     }
    // }

    //lấy mặt hàng có lương lớn nhất
    public function matHangXemNhieuNhat(){
        $db = DATABASE::connect();
        try{
            $sql = "select * from mathang where luotxem = (select MAX(luotxem) from mathang)";
            $cmd = $db->prepare($sql);
            $cmd->execute();
            return $cmd->fetchAll();
        }
        catch(PDOException $e){
            $sLoi = $e->getMessage();
            echo "<p>Lỗi truy vấn: $sLoi</p>";
            exit();
        }
    }

    //Thêm mặt hàng
    public function themMatHang($ten, $mota, $giaban, $hinhanh, $dmID){
        $db = DATABASE::connect();
        try{
            $sql = "Insert into mathang(tenmathang, mota, giagoc, giaban, soluongton, hinhanh, danhmuc_id, luotxem, luotmua) values(:ten, :mota, 0,:giaban,10,:hinhanh,:danhmuc_id,0,0)";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":ten", $ten);
            $cmd->bindValue(":mota", $mota);
            $cmd->bindValue(":giaban", $giaban);
            $cmd->bindValue(":hinhanh", $hinhanh);
            $cmd->bindValue(":danhmuc_id", $dmID);
            return $cmd->execute();
        }
        catch(PDOException $e){
            echo "<p>Lỗi truy vấn". $e->getMessage()."</p>";
            exit();
        }
    }

    //Xoá mặt hàng
    public function xoaMatHang($mhID){
        $db = DATABASE::connect();
        try{
            $sql = "DELETE FROM mathang WHERE id=:mhID";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":mhID", $mhID);
            return $cmd->execute();
        }
        catch(PDOException $e){
            echo '<p>'.$e->getMessage().'</p>';
            exit();
        }
    }

    //Sửa mặt hàng
    public function suaMatHang($mhID ,$ten, $mota, $giaban, $hinhanh, $dmID){
        $db = DATABASE::connect();
        try{
            $sql = "UPDATE mathang 
            SET tenmathang = :ten, mota = :mota, giaban = :giaban, hinhanh = :hinhanh, danhmuc_id = :danhmuc_id
            WHERE id = :matHangID";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":ten", $ten);
            $cmd->bindValue(":mota", $mota);
            $cmd->bindValue(":giaban", $giaban);
            $cmd->bindValue(":hinhanh", $hinhanh);
            $cmd->bindValue(":danhmuc_id", $dmID);
            $cmd->bindValue(":matHangID", $mhID);
            return $cmd->execute();
        }
        catch(PDOException $e){
            echo "<p>Lỗi truy vấn $e->getMessage()</p>";
            exit();
        }
    }

    //Sửa mặt hàng mà không sửa hình
    public function suaMatHangNgoaiTruTHuocTinhHinhAnh($mhID ,$ten, $mota, $giaban, $dmID){
        $db = DATABASE::connect();
        try{
            $sql = "update mathang 
            set tenmathang = :ten, mota = :mota, giaban = :giaban, danhmuc_id = :danhmuc_id
            WHERE id = :matHangID";
            $cmd = $db->prepare($sql);
            $cmd->bindValue(":ten", $ten);
            $cmd->bindValue(":mota", $mota);
            $cmd->bindValue(":giaban", $giaban);
            $cmd->bindValue(":danhmuc_id", $dmID);
            $cmd->bindValue(":matHangID", $mhID);
            return $cmd->execute();
        }
        catch(PDOException $e)
        {
            echo '<p>Lỗi truy vấn: '.$e->getMessage().'</p>';
            exit();
        }
    }
}
?>
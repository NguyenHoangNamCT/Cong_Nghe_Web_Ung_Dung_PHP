<?php
class NGUOIDUNG{
     private $id, $email, $soDienThoai, $matKhau, $hoTen, $loai, $trangThai, $hinhAnh;


     public function __constructor($id,$email,$soDienThoai,$matKhau,$hoTen,$loai,$trangThai,$hinhAnh) { 
          $this->id = $id; 
          $this->email = $email; 
          $this->soDienThoai = $soDienThoai; 
          $this->matKhau = $matKhau; 
          $this->hoTen = $hoTen; 
          $this->loai = $loai; 
          $this->trangThai = $trangThai; 
          $this->hinhAnh = $hinhAnh; 
     }

     function getEmail() { 
          return $this->email; 
     } 

     function getSoDienThoai() { 
          return $this->soDienThoai; 
     } 

     function getMatKhau() { 
          return $this->matKhau; 
     } 

     function getHoTen() { 
          return $this->hoTen; 
     } 

     function getLoai() { 
          return $this->loai; 
     } 

     function getTrangThai() { 
          return $this->trangThai; 
     } 

     function getHinhAnh() { 
          return $this->hinhAnh; 
     } 

     function setEmail($email) {  
          $this->email = $email; 
     } 

     function setSoDienThoai($soDienThoai) {  
          $this->soDienThoai = $soDienThoai; 
     } 

     function setMatKhau($matKhau) {  
          $this->matKhau = $matKhau; 
     } 

     function setHoTen($hoTen) {  
          $this->hoTen = $hoTen; 
     } 

     function setLoai($loai) {  
          $this->loai = $loai; 
     } 

     function setTrangThai($trangThai) {  
          $this->trangThai = $trangThai; 
     } 

     function setHinhAnh($hinhAnh) {  
          $this->hinhAnh = $hinhAnh; 
     }

     //kiểm tra người dùng có hợp lệ hay không
     public function kiemTraNguoiDungHopLe($email, $matKhau) {
          $db = DATABASE::connect();
          try{
          $sql = "select * from nguoidung where email = :email and matkhau = :matKhau and trangthai = 1";
          $cmd = $db->prepare($sql);
          $cmd->bindValue(':email', $email);
          $cmd->bindValue(':matKhau', md5($matKhau));
          $cmd->execute();
          $cmd->closeCursor();
          return ($cmd->rowCount() == 1);//trả về true/false
          }
          catch(PDOException $e){
          echo "<p>Lỗi truy vấn: ".$e->getMessage()."</p>";
          exit();
          }
     }

     //lấy tất cả người dùng
     public function layNguoiDung()
     {
          $db = DATABASE::connect();
          try{
               $sql = "select * from nguoidung";
               $cmd = $db->prepare($sql);
               $cmd->execute();
               return $cmd->fetchALL();
          }
          catch(PDOException $e){
               echo "<p>Lỗi truy vấn ".$e->getMessage()."</p>";
               exit();
          }
     }

     //lấy một ngườI dùng
     public function layMotNguoiDung($email)
     {
          $db = DATABASE::connect();
          try{
               $sql = "select * from nguoidung where email = :email";
               $cmd = $db->prepare($sql);
               $cmd->bindValue(":email", $email);
               $cmd->execute();
               return $cmd->fetch();
          }
          catch(PDOException $e){
               echo "<p>Lỗi truy vấn ".$e->getMessage()."</p>";
               exit();
          }
     }

     //cập nhật hồ sơ người dùng
     public function capNhatHoSo($email, $hoTen, $soDienThoai, $hinhAnh){
          $db = DATABASE::connect();
          try{
               $sql = "update nguoidung set hoten = :hoTen, sodienthoai = :soDienThoai, hinhanh = :hinhAnh where email = :email";
               $cmd = $db->prepare($sql);
               $cmd->bindValue(":hoTen", $hoTen);
               $cmd->bindValue(":soDienThoai", $soDienThoai);
               $cmd->bindValue(":hinhAnh", $hinhAnh);
               $cmd->bindValue(":email", $email);
               return $cmd->execute();
          }
          catch(PDOException $e){
               echo "<p>Lỗi truy vấn ".$e->getMessage()."</p>";
               exit();
          }
     }
     public function doiMatKhau($email, $matKhauMoi){
          $db = DATABASE::connect();
          try{
               $sql = "update nguoidung set matkhau = :matKhauMoi where email = :email";
               $cmd = $db->prepare($sql);
               $cmd->bindValue(":email", $email);
               $cmd->bindValue(":matKhauMoi", md5($matKhauMoi));
               return $cmd->execute();
          }
          catch(PDOException $e){
               echo "<p>Lỗi truy vấn".$e->getMessage()."</p>";
               exit();
          }
     }
     // public function FunctionNa(){
     //      $db = DATABASE::connect();
     //      try{
     
     //      }
     //      catch(PDOException $e){
     //           echo "<p>Lỗi truy vấn ".$e->getMessage()."</p>";
     //           exit();
     //      }
     // }
}
<?php 
    include("../view/top.php");
    $mangNguoiDung = $nd->layNguoiDung();
?>
    <h2>Quản lý người dùng</h2>
    <a href="" data-toggle="modal" data-target="#fThemNguoiDung" class="btn btn-info">Thêm người dùng</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Email</th>
                <th>Tên</th>
                <th>Phân quyền</th>
                <th>Trạng thái</th>
                <th>Khoá</th>
                <th>Xoá</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($mangNguoiDung as $arr)
                {      
            ?>
                    <tr>
                        <td><?php echo $arr['email']; ?></td>
                        <td><?php echo $arr['hoten']; ?></td>
                        <td>
                            <?php
                                $loaiND = $arr['loai']; 
                                if($loaiND == 1)
                                    echo "Quản trị";
                                else if($loaiND == 2)
                                    echo "Nhân viên";
                                else if($loaiND == 3)
                                    echo "Người dùng";
                            ?>
                        </td>
                        <td>
                            <?php 
                                $trangThai = $arr['trangthai'];
                                if($trangThai == 1)
                                    echo "Kích hoạt";
                                else 
                                    echo "Khoá";
                            ?>
                        </td>
                        <td>
                          <?php 
                            if($arr['trangthai'] == 1)
                            {
                          ?>
                              <a href="?action=thayDoiTrangThai&id=<?php echo $arr['id']; ?>&trangThai=<?php echo $arr['trangthai']; ?>" class="btn btn-danger">Khoá</a>
                          <?php 
                            }
                            else
                            {
                          ?>
                              <a href="?action=thayDoiTrangThai&id=<?php echo $arr['id']; ?>&trangThai=<?php echo $arr['trangthai']; ?>" class="btn btn-success">Mở khoá</a>
                          <?php 
                            }
                          ?>
                        </td>
                        <td><a href="?action=xoa&id=<?php echo $arr['id']; ?>&quyen=<?php echo $arr['loai']; ?>" class="btn btn-danger">Xoá</a></td>
                    </tr>
            <?php
                  if(isset($idNguoiDungKhongDuocPhepXoa) && $arr['id'] == $idXoaNguoiDung)
                  {
                    echo '<tr>';
                      echo '<td>';
                        echo 
                        '<div class="alert alert-warning">
                          <strong>Không thể xoá người dùng bên trên!</strong> Chỉ có thể xoá người dùng với quyền của người đó là người dùng.
                        </div>';
                      echo '</td>';
                    echo '</tr>';
                  }                  
                }
            ?>
        </tbody>
    </table>

    <div class="modal fade" id="fThemNguoiDung" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" datadismiss="modal">&times;</button>
              <h3 class="modal-title">Thêm người dùng</h3>
            </div>
            <div class="modal-body">
              <form method="post" enctype="multipart/form-data">

                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" type="text" name="txtEmail"
                  placeholder="Email"
                  require>
                </div>
                
                <div class="form-group">
                  <label>Họ tên</label>
                  <input class="form-control" type="text" name="txtHoTen"
                  placeholder="Họ tên"
                  required>
                </div>

                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input class="form-control" type="number" name="txtDienThoai"
                  placeholder="Số điện thoại"
                  require>
                </div>

                <div class="form-group">
                  <label>Mật khẩu</label>
                  <input class="form-control" type="password" name="txtMatKhau"
                  placeholder="Mật khẩu">
                </div>

                <div class="form-group">
                    <label>Quyền</label>
                    <select class="form-control" name="selectLoai">
                        <option value="">--Chọn quyền--</option>
                        <option value="1">Quản trị</option>
                        <option value="2">Nhân viên</option>
                        <option value="3">Người dùng</option>
                    </select>
                </div>

                <div class="form-group">
                  <!-- Gửi action qua cho index trong kiểm tra người dùng (trong trường hợp này file top này đang nằm trong index của ktnguoidung) -->
                  <input type="hidden" name="action" value="themNguoiDung" >
                  <input class="btn btn-primary" type="submit" value="Lưu">
                  <input class="btn btn-warning" type="reset" value="Điền lại">
                </div>
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" datadismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
    </div>
<?php 
    include("../view/bottom.php");
?>
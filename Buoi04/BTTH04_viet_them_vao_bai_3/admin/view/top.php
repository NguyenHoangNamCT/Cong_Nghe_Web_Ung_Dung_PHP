<!DOCTYPE html>
<html lang="en">
<head>
  <title>ABC Shop - Trang quản trị</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .row.content {height: 900px}
    .sidenav {background-color: #f1f1f1; height: 100%;}
    @media screen and (max-width: 767px) { .row.content {height: auto;} }
  </style>
</head>
<body>
<!-- Menu mh nhỏ -->
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">ABC Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Bảng điều khiển</a></li>
        <li><a href="../qldanhmuc/index.php">Quản lý danh mục</a></li>
        <li><a href="../qlmathang/index.php">Quản lý mặt hàng</a></li>
        <li><a href="">Khác...</a></li>        
      </ul>
    </div>
  </div>
</nav>
<!-- Menu mh nhỏ - kết thúc -->
<div class="container-fluid">
  <div class="row content">
    <!-- Menu mh lớn -->     
    <div class="col-sm-3 sidenav hidden-xs">
      <h3>          
        <span class="label label-info">A</span>
        <span class="label label-warning">B</span>
        <span class="label label-danger">C</span>
        Shop
      </h3><br>
      <ul class="nav nav-pills nav-stacked">
        <li class="active"><a href="#"><span class="glyphicon glyphicon-cog"></span> Bảng điều khiển</a></li>
        <li><a href="../qldanhmuc/index.php"><span class="glyphicon glyphicon-list-alt"></span> Quản lý danh mục</a></li>
        <li><a href="../qlmathang/index.php"><span class="glyphicon glyphicon-gift"></span> Quản lý mặt hàng</a></li>
        <li><a href=""><span class="glyphicon glyphicon-list-alt"></span> Quản lý... (bổ sung)</a></li>
      
      </ul><br>
    </div>
    <!-- Menu mh lớn - kết thúc -->
    <br>
    
    <div class="col-sm-9">
      <div class="container-fluid">  
        <!-- Thông tin người dùng - sẽ bổ sung ở bài thực hành sau -->          
        <div class="dropdown" style="text-align: right;">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            <span class="glyphicon glyphicon-user"></span>
            Chào <?php if(isset($_SESSION['nguoiDung'])) echo $_SESSION['nguoiDung']['hoten']; ?>
            <span class="caret"></span>
          </a>
            
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Thông báo</a></li>
            <li><a href="#" data-toggle="modal" data-target="#fCapNhatThongTin"><span class="glyphicon glyphicon-edit"></span> Hồ sơ cá nhân</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-wrench"></span> Đổi mật khẩu</a></li>
            <li class="divider"></li>
            <li><a href="../ktnguoidung/index.php?action=dangXuat"><span class="glyphicon glyphicon-log-out"></span> Thoát</a></li>
          </ul>
        </div>
      </div>
    
      <!-- Form cậP nhật hồ sơ người dùng -->
      <div class="modal fade" id="fCapNhatThongTin" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" datadismiss="modal">&times;</button>
              <h3 class="modal-title">Hồ sơ cá nhân</h3>
            </div>
            <div class="modal-body">
              <form method="post" enctype="multipart/form-data">
                <div class="text-center">
                  <img class="img-circle" src="../../images/<?php echo $_SESSION["nguoiDung"]["hinhanh"]; ?>" alt="<?php echo
                  $_SESSION["nguoiDung"]["hoten"]; ?>" width="100px">
                </div>

                <div class="form-group">
                  <label>Email</label>
                  <input class="form-control" type="email" name="txtEmail"
                  placeholder="Email" value="<?php echo $_SESSION["nguoiDung"]["email"]; ?>">
                </div>

                <div class="form-group">
                  <label>Số điện thoại</label>
                  <input class="form-control" type="number" name="txtDienThoai"
                  placeholder="Email" value="<?php echo $_SESSION["nguoiDung"]["sodienthoai"]; ?>">
                </div>

                <div class="form-group">
                  <label>Họ tên</label>
                  <input class="form-control" type="text" name="txtHoTen"
                  placeholder="Họ tên" value="<?php echo $_SESSION["nguoiDung"]["hoten"]; ?>"
                  required>
                </div>

                <div class="form-group">
                  <label>Đổi hình đại diện</label>
                  <input name="txtHinhCu" type="hidden" value="<?php echo $_SESSION["nguoiDung"]["hinhanh"]; ?>">
                  <input type="file" name="fileHinhCapNhat">
                </div>

                <div class="form-group">
                  <input type="hidden" name="txtid" value="<?php echo
                  $_SESSION["nguoiDung"]["id"]; ?>" >
                  <!-- Gửi action qua cho index trong kiểm tra người dùng (trong trường hợp này file top này đang nằm trong index của ktnguoidung) -->
                  <input type="hidden" name="action" value="capNhatHoSoCaNhan" >
                  <input class="btn btn-primary" type="submit" value="Lưu">
                  <input class="btn btn-warning" type="reset" value="Hủy">
                </div>
              </form>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default" datadismiss="modal">Đóng</button>
            </div>
          </div>
        </div>
      </div>

     
    

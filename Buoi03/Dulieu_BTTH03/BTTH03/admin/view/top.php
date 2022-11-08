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
            <span class="glyphicon glyphicon-user"></span> Chào --tên--
            <span class="caret"></span>
          </a>
            
          <ul class="dropdown-menu dropdown-menu-right">
            <li><a href="#"><span class="glyphicon glyphicon-envelope"></span> Thông báo</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-edit"></span> Hồ sơ cá nhân</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-wrench"></span> Đổi mật khẩu</a></li>
            <li class="divider"></li>
            <li><a href=""><span class="glyphicon glyphicon-log-out"></span> Thoát</a></li>
          </ul>
        </div>
      </div>
      

     
    

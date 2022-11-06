<!DOCTYPE html>
<html lang="en">
<head>
  <title>ABC Shop</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <link rel="stylesheet" href="css/shop.css">
  <script src="js/shop.js"></script>

</head>
<body>
<div class="banner">
  <img name="bannerpic" class="banner" src="images/banner/top1.png">  
</div>

<nav class="navbar navbar-inverse" id="stick">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="index.php">ABC Shop</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php"><span class="glyphicon glyphicon-home"></span> Trang chủ</a></li>
        <li><a href="#">Sản phẩm nổi bật</a></li>
      
        <!-- Dropdown (SV bổ sung) -->
        <li class="nav-item dropdown">
          <a class="nav-link" href="#" data-toggle="dropdown">
            Danh mục sản phẩm<span class="caret"></span>
          </a>
          <ul class="dropdown-menu">
            <?php 
              foreach($danhMuc as $d){
                echo "<li><a href='group.php?id=".$d['id']."'>".$d["tendanhmuc"]."</a></li>";
              }
            ?>
          </ul>
        </li>
      <!-- End Dropdown -->

        <li><a href="#">Liên hệ</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span></a></li>
        <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span></a></li>
      </ul>
    </div>
  </div>
</nav>
<?php 
  require('model/database.php');
  require('model/danhmuc.php');
  require('model/mathang.php');
  include('include/top.php');

  if(isset($_GET['id']))
    $dmID = $_GET['id'];
  else
    $dmID = 1;

  $danhMuc = $dm->laydanhmuctheoid($dmID);//biến $dm đã khai báo ở file top.php

  $mh = new MatHang();
  $matHang = $mh->layMatHangTheoDanhMuc($dmID);

  $cacMatHangXemNhieuNhat = $mh->matHangXemNhieuNhat();
?>
<!-- ================================== -->
<div class="container">
<div class="row">
  <div class="col-sm-9">
      <h3>Các sản phẩm thuộc danh mục</h3>
      <?php foreach($matHang as $m) {?>
        <div class="col-sm-4">
          <div class="panel panel-warning">
              <div class="panel-heading">
                  <a href="detail.php?id="<?php echo $m['id']; ?>><?php echo $m['tenmathang']; ?></a>  
              </div>

              <div class="panel-body">
                <a href="detail.php?id=<?php echo $m['id']?>">
                  <img src="<?php echo $m['hinhanh']; ?>" class="img-responsive fake" alt="Tên hàng">
                </a>
                <div>Giá bán: <?php echo number_format($m['giaban']); ?></div>
              </div>

              <div class="panel-footer" align="center">
                <a href="detail.php?id=<?php echo $m['id']?>" class="btn btn-info">Xem thêm</a>
                <a href="" class="btn btn-danger">Chọn mua</a>
              </div>
          </div>
        </div>
      <?php }?>
  </div>
    <div class="col-sm-3">
      <h3>Sản phẩm nổi bật nhất</h3>
      <?php
        foreach($cacMatHangXemNhieuNhat as $r){
      ?>
        <div class="panel panel-primary">          
            <div class="panel-heading">
                <a style="color:white" href="group.php?id=<?php echo $r['id']?>">
                  <?php $thisDanhMuc = $dm->laydanhmuctheoid($r['id']);
                        echo $thisDanhMuc['tendanhmuc'];
                  ?>
                </a>  
            </div>

            <div class="panel-body">
              <a href="detail.php?id=<?php echo $r['id']?>">
                <img src="<?php echo $r['hinhanh'];?>" class="img-responsive fake" alt="Tên hàng">
              </a>
            </div>

            <div class="panel-footer"><a href="detail.php?id=<?php echo $r['id']?>"><?php echo $r['tenmathang']; ?></a></div>
        </div>
      <?php  }?>
    </div>
</div>
<!-- ================================== -->
<?php include('include/bottom.php'); ?>
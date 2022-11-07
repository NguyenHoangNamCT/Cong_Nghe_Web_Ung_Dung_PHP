<?php 
  require('model/database.php');
  require('model/danhmuc.php');
  require('model/mathang.php');
  include('include/top.php');

  if(isset($_GET['id']))
    $mhID = $_GET['id'];
  else
    $mhID = 1;

  //lấy mặt hàng được chọn
  $mh = new MatHang();
  $matHang = $mh->layMotMatHangTheoID($mhID);

  //lấy 5 sản phẩm nổi bật
  $tatCaMatHang = $mh->layMatHang();


  $mangMatHang = array();
  foreach($tatCaMatHang as $r){
    $mangMatHang[] = $r;
  }

  echo var_dump(count($mangMatHang));

  //sắp xếp giảm dần
  for($i = 0; $i < count($mangMatHang) - 1; $i++)
    for($j = $i + 1; $j < count($mangMatHang); $j++)
      if($mangMatHang[$j]['luotxem'] > $mangMatHang[$i]['luotxem']){
        echo 'hello';
        $temp = $mangMatHang[$i];
        $mangMatHang[$i] = $mangMatHang[$j];
        $mangMatHang[$j] = $temp;
      }
  $mh->tangLuotXem($mhID);
?>
<!-- ================================== -->
<div class="container">
    <div class="row">
        <div class="col-sm-9">
            <h3>Chi tiết: <?php echo $matHang["tenmathang"] ?></h3>
            <div>Giá bán: <span class="text-danger"><?php echo number_format($matHang['giaban']); ?></span></div>
            <div><img src="<?php echo $matHang['hinhanh'] ?>" alt="Không tìm thấy ảnh"></div>
            <div>
              <a href="" class="btn btn-info">Thêm vào giỏ hàng</a>
              <a href="" class="btn btn-danger">Mua ngay</a>
            </div>
        </div>
        
        <div class="col-sm-3">
          <h3>Top 5 sản phẩm nổi bật</h3>
          <?php
           for($i = 0; $i < count($mangMatHang); $i++){
            if($i > 4)
              break;
          ?>
            <div class="panel panel-primary">          
                <div class="panel-heading">
                    <a style="color:white" href="group.php?id=<?php echo $r['id']?>">
                      <?php $thisDanhMuc = $dm->laydanhmuctheoid($mangMatHang[$i]['id']);
                            echo $thisDanhMuc['tendanhmuc'];
                      ?>
                    </a>  
                </div>

                <div class="panel-body">
                  <a href="detail.php?id=<?php echo $mangMatHang[$i]['id']?>">
                    <img src="<?php echo $mangMatHang[$i]['hinhanh'];?>" class="img-responsive fake" alt="Tên hàng">
                  </a>
                </div>

                <div class="panel-footer"><a href="detail.php?id=<?php echo $mangMatHang[$i]['id']?>"><?php echo $mangMatHang[$i]['tenmathang']; ?></a></div>
            </div>
          <?php } ?>
        </div>
    </div>
</div>
<!-- ================================== -->
<?php include('include/bottom.php'); ?>
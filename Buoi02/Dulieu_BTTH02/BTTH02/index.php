<?php 
  require('model/database.php');
  require('model/danhmuc.php');
  require('model/mathang.php');

  $dm = new DANHMUC();
  $danhMuc = $dm->laydanhmuc();

  $mh = new MatHang();
  $matHang = $mh->layMatHang();
  include('include/top.php');
?>
<!-- ================================== -->
<div class="container">
<?php foreach($danhMuc as $d){?>
  <h3><a href="group.php?id=<?php echo $d['id']?>"> SẢN PHẨM: <?php echo $d['tendanhmuc'];?> <span class="glyphicon glyphicon-triangle-right"></span></a></h3>
  <div class="row">
    <?php foreach($matHang as $m){ 
        if($m['danhmuc_id'] == $d['id']){?>
          <div class="col-sm-3">
            <div class="panel panel-primary">          
              <div class="panel-heading">
                  <a style="color:white" href="group.php?id=<?php echo $d['id']?>">
                    <?php echo $d["tendanhmuc"]; ?>
                  </a>  
              </div>

              <div class="panel-body">
                <a href="detail.php?id=<?php echo $m['id']?>">
                  <img src="<?php echo $m['hinhanh'];?>" class="img-responsive fake" alt="Tên hàng">
                </a>
              </div>

              <div class="panel-footer"><a href="detail.php?id=<?php echo $m['id']?>"><?php echo $m['tenmathang']; ?></a></div>
            </div>
          </div>
    <?php 
      }//đóng cho if
    }//đóng foreach mat hang 
    ?>
    
  </div>
<?php }//đóng foreach danh mục?>
</div>
<!-- ================================== -->
<?php include('include/bottom.php'); ?>
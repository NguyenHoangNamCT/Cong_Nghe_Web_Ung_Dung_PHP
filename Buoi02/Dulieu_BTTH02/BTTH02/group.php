<?php 
  require('model/database.php');
  require('model/danhmuc.php');
  require('model/mathang.php');

  $dm = new DANHMUC();
  $danhMuc = $dm->laydanhmuc();


  if(!isset($_GET['id']))
    $dmID = $_GET['id'];
  else
    $dmID = 1;

  $mh = new MatHang();
  $matHang = $mh->layMatHangTheoDanhMuc($dmID);
  include('include/top.php');
?>
<!-- ================================== -->
<div class="container">
<div class="row">
    <div class="col-sm-9">
        <h3>Các sản phẩm thuộc danh mục</h3>
        <?php foreach($matHang as $m) {?>
          <div class="col-sm-4">
            <div class="panel panel-primary">          
                <div class="panel-heading">
                    <a style="color:white" href="group.php?id=<?php echo $dmID;?>">
                      <?php echo $d['tendanhmuc'];?> <?php //sao biến $d ở đây dùng được?>
                    </a>  
                </div>

                <div class="panel-body">
                  <a href="">
                    <img src="<?php echo $m['hinhanh']; ?>" class="img-responsive fake" alt="Tên hàng">
                  </a>
                </div>

                <div class="panel-footer"><a href=""><?php echo $m['tenmathang'];?></a></div>
            </div>
          </div>
        <?php }?>
    </div>
    
</div>
<!-- ================================== -->
<?php include('include/bottom.php'); ?>
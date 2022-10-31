<?php include('include/top.php') ?>
<!-- ================================== -->
<div class="container">

  <h3><a href="">SẢN PHẨM <span class="glyphicon glyphicon-triangle-right"></span></a></h3>
  <div class="row">
    <?php for($i=1; $i<=12; $i++){ ?>
    <div class="col-sm-3">
      <div class="panel panel-primary">
        <div class="panel-heading">
          <a style="color:white" href="">
          DANH MỤC
          </a>  
        </div>
        <div class="panel-body"><a href=""><img src="" class="img-responsive fake" alt="Tên hàng"></a>
        </div>
        <div class="panel-footer"><a href="">Tên hàng</a></div>
      </div>
    </div>    
    <?php } ?>
    
  </div>
</div>
<!-- ================================== -->
<?php include('include/bottom.php'); ?>
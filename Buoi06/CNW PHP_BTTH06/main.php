<?php include("view/top.php"); ?>

<br><br>
<div class="container">  
  <div class="row"> <!-- Tất cả mặt hàng - Xử lý phân trang -->
     <a name="sptatca"></a>
     <h3>Tất cả sản phẩm </h3>
    <?php
    foreach($mathang as $mh):
    ?>
    <div class="col-sm-3">
      <div class="panel panel-primary text-center">
        <div class="panel-heading">
           
          <a href="?action=xemchitiet&mahang=<?php echo $mh["id"]; ?>" style="color:white;font-weight:bold;" ><?php echo $mh["tenmathang"]; ?></a>
        </div>
        <div class="panel-body">
			<a href="?action=xemchitiet&mahang=<?php echo $mh["id"]; ?>"><img src="<?php echo $mh["hinhanh"]; ?>" class="img-responsive" style="width:100%" alt="<?php echo $mh["tenmathang"]; ?>"></a>
			<strong>Giá bán: <span  class="text-danger">
            <?php echo number_format($mh["giaban"]); ?>đ</span> </strong>
		</div>
        <div class="panel-footer">          
			<a class="btn btn-info" href="?action=xemchitiet&mahang=<?php echo $mh["id"]; ?>">
    	Chi tiết</a> 
			<a class="btn btn-danger" href="index.php?action=chovaogio&id=<?php echo $mh["id"]; ?>&soluong=1">Chọn mua</a>  

        </div>
      </div>
    </div>    
    <?php endforeach; ?>
  </div>
<div class="row">
	<ul class="pagination">
		<li><a href="index.php?trang=1"><span class="glyphicon glyphicon-step-backward"></span></a></li>
	<?php
	for($i=1; $i<=$tongsotrang; $i++){
	?>	
		<li <?php if($tranghh == $i) echo " class=\"active\"" ?>>
		<a href="index.php?trang=<?php echo $i; ?>"><?php echo $i; ?></a></li>
	<?php	
	}
	?>
		<li><a href="index.php?trang=<?php echo $tongsotrang; ?>"><span class="glyphicon glyphicon-step-forward"></span></a></li>
	</ul>
</div>
  
  <?php include("topview.php"); ?>
  

</div>

<?php include("view/carousel.php"); ?>
<?php include("view/bottom.php"); ?>
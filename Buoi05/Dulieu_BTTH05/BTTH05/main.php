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
          <a href="?action=xemch  itiet&mahang=<?php echo $mh["id"]; ?>"><img src="<?php echo $mh["hinhanh"]; ?>" class="img-responsive" style="width:100%" alt="<?php echo $mh["tenmathang"]; ?>"></a>
          <strong>
            Giá bán: 
            <span  class="text-danger"><?php echo number_format($mh["giaban"]); ?>đ</span> 
          </strong>
        </div>

        <div class="panel-footer">
          <a class="btn btn-success" href="?action=xemchitiet&mahang=<?php echo $mh["id"]; ?>">Chi tiết</a>
          <a class="btn btn-danger" href="?action=choVaoGio&id=<?php echo $mh['id']; ?>&soLuong=1">Chọn mua</a>
        </div>

      </div>
    </div>    
    <?php endforeach; ?>
  </div>

  <div class="row" align='center'>
		<ul class="pagination">
		  
			<li><a href="?trangDuocChon=1"><span class="glyphicon glyphicon-step-backward"></span></a></li>

			<li><a href="?trangDuocChon=<?php  if($trangDuocChon > 1) echo ($trangDuocChon - 1); else echo 1; ?>"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
			<?php
        for($i = 0; $i < $soTrang; $i++)
          if($trangDuocChon == ($i + 1))
          {
      ?>
			      <li class="active"><span><?php echo ($i + 1); ?></span></li>
      <?php
          }
          else
          {
      ?>
			      <li><a href="?trangDuocChon=<?php echo ($i + 1); ?>"><?php echo ($i + 1); ?></a></li>
      <?php
          }
      ?>

			<li><a href="?trangDuocChon=<?php if($trangDuocChon < $soTrang) echo ($trangDuocChon + 1); else echo $soTrang ?>"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
			
			<li><a href="?trangDuocChon=<?php echo $soTrang; ?>"><span class="glyphicon glyphicon-step-forward"></span></a></li>
		</ul>
	</div>

  <!-- <div class="row" align='center'>//code html gốc của thanh phân trang
		<ul class="pagination">
		  
			<li><a href="?trang=1"><span class="glyphicon glyphicon-step-backward"></span></a></li>

			<li><a href="?trang=1"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
			
			<li class="active"><span>1</span></li>

			<li><a href="?trang=2">2</a></li>

			<li><a href="?trang=1"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
			
			<li><a href="?trang=1"><span class="glyphicon glyphicon-step-forward"></span></a></li>
		</ul>
	</div>   -->
  
  <?php include("topview.php"); ?>

</div>

<?php include("view/carousel.php"); ?>
<?php include("view/bottom.php"); ?>
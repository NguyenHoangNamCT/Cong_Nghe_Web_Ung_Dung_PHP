<?php include("view/top.php"); ?>
<br><br><br>
<div class="container">    
  <div class="row"> 
    <h3>Giỏ hàng của bạn</h3>
	<?php
	if(demhangtronggio() == 0)
		echo "<p>Giỏ hàng rỗng!</p>";
	else{
	?>
	<form method="post">
	<input type="hidden" name="action" value="capnhatgiohang">
	<table class="table table-hover">
		<tr class="info"><th>Mặt hàng</th><th>Giá</th><th>Số lượng</th><th>Thành tiền</th></tr>
		<?php
		foreach($giohang as $mahang => $mh){
		?>
		<tr>
			<td><img class="img-thumbnail" width="30" src="<?php echo $mh["hinhanh"]; ?>"> <?php echo $mh["tenmathang"]; ?></td>
			<td><?php echo number_format($mh["giaban"]); ?>đ</td>
			<td><input name="mh[<?php echo $mahang; ?>]" type="number" value="<?php echo $mh["soluong"]; ?>"></td>
			<td><?php echo $mh["sotien"]; ?></td>
		</tr>
		<?php
		} // end for
		?>
		<tr>
			<td colspan="3"><strong>Tổng tiền</strong></td>
			<td><strong><?php echo number_format(tinhtiengiohang()); ?>đ</strong></td>
		</tr>
		<tr>
			<td colspan="3"><a href="index.php?action=xoagiohang">Xóa tất cả</a></td>
			<td>
				<input type="submit" value="Cập nhật" class="btn btn-warning">
				<a href="?action=thanhToan" class="btn btn-danger">Thanh toán</a>
			</td>
		</tr>
	</table>
	</form>
	<?php } // end if ?>
  </div>
</div>
<?php include("view/carousel.php"); ?>
<?php include("view/bottom.php"); ?>
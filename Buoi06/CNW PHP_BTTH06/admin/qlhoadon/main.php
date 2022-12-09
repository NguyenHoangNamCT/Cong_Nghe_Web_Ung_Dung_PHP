<?php include("../view/top.php"); ?>

<h3>Quản lý đơn hàng</h3> 
<br>
<br> <br> 
<table class="table table-hover">
	<tr>
		<th>Mã hoá đơn</th>
		<th>Tên người mua</th>
		<th>Địa chỉ giao hàng</th>
		<th>Thời điểm mua</th>
		<th>Tổng tiền</th>		
		<th>Sửa</th>
		<th>Xóa</th>
	</tr>
	<?php
		$hoaDon = new DONHANG();
		$diaChi = new DIACHI();
		$mangHoaDon = $hoaDon->layDonHang();
		foreach($mangHoaDon as $hoaDon)
			if($hoaDon['id'] == $idSua)
			{
	?>
				<form method="post">
					<tr>
						<td><?php echo $hoaDon["id"]; ?></td>
						<td><?php echo $hoaDon["hoten"]; ?></td>
						<td><input name="inputDiaChi" type="text" class="form-control" value="<?php echo $diaChi->layDiaChiTheoNguoiDungId($hoaDon['nguoidung_id'])['diachi']; ?>"></td>
						<td><?php echo $hoaDon["ngay"]; ?></td>
						<td><input name="inputTongTien" type="number" class="form-control" value="<?php echo $hoaDon["tongtien"]; ?>"></td>
						<!-- Gửi dữ liệu ẩn -->
						<input type="hidden" name="action" value="xuLySua">
						<input type="hidden" name="donHangId" value="<?php echo $hoaDon['id']; ?>">
						<input type="hidden" name="nguoiDungId" value="<?php echo $hoaDon['nguoidung_id'] ?>">
						<!-- Kết thúc ẩn -->
						<td>
							<button type="submit" class="btn btn-success" href="?action=sua&id=<?php echo $hoaDon["id"]; ?>"><span class="glyphicon glyphicon-saved"> </span></button>
							<a class="btn btn-warning" href="?action=sua&id=<?php echo $hoaDon["id"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a>
						</td>
						<td><a class="btn btn-danger" href="?action=xoa&id=<?php echo $hoaDon["id"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
					</tr>
				</form>
	<?php
			}
			else
			{
	?>
				<tr>
					<td><?php echo $hoaDon["id"]; ?></td>
					<td><?php echo $hoaDon["hoten"]; ?></td>
					<td><?php echo $diaChi->layDiaChiTheoNguoiDungId($hoaDon['nguoidung_id'])['diachi']; ?></td>
					<td><?php echo $hoaDon["ngay"]; ?></td>
					<td><?php echo number_format($hoaDon["tongtien"]); ?></td>
					<td><a class="btn btn-warning" href="?action=sua&id=<?php echo $hoaDon["id"]; ?>"><span class="glyphicon glyphicon-edit"> </span></a></td>
					<td><a class="btn btn-danger" href="?action=xoa&id=<?php echo $hoaDon["id"]; ?>"><span class="glyphicon glyphicon-trash"></span></a></td>
				</tr>
	<?php
			}
	?>
</table>

<?php include("../view/bottom.php"); ?>

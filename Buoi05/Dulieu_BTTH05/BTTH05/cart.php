<?php include("view/top.php"); ?>
<br><br><br><br><br><br><br><br>
<div class="container">    
  <div class="row"> 
    <h3>Giỏ hàng của bạn</h3>
    <table class="table table-striped">
      <thead>
          <tr>
              <th>Sản phẩm</th>
              <th>Đơn giá</th>
              <th>Hình ảnh</th>
              <th>Số lượng</th>
              <th>Thành tiền</th>
              <th>Xoá</th>
          </tr>
      </thead>
      <tbody>
        <?php
          foreach($_SESSION['gioHang'] as $mangMatHang)
          {
          ?>      
            <tr>
                <td><?php echo $mangMatHang['tenmathang']; ?></td>
                <td><?php echo number_format($mangMatHang['giaban']); ?></td>
                <td><img width="50" class="img-thumbnail" src="<?php echo $mangMatHang['hinhanh']; ?>" alt="Khômg tìm thấy"></td>
                <td><?php echo $mangMatHang['soLuong']; ?></td>
                <td><?php echo number_format($mangMatHang['giaban'] * $mangMatHang['soLuong']); ?></td>
                <td><a href="?action=xoaSPKhoiGioHang&chiSo=<?php echo $mangMatHang['id']; ?>" class="btn btn-danger">Xoá</a></td>
            </tr>
        <?php
          }
        ?>
      </tbody>
    </table>    
  </div>
</div>
<?php include("view/carousel.php"); ?>
<?php include("view/bottom.php"); ?>
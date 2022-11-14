<?php include("../view/top.php"); ?>
<div class="container">
  <h2>Thêm một mặt hàng</h2>
  <form class="form-horizontal" method="post" enctype="multipart/form-data">
    <!-- Gửi action qua cho index -->
    <input type="hidden" name='action' value="xuLyThem">

    <div class="form-group">
      <label class="col-sm-2 control-label">Tên mặt hàng: </label>
      <div class="col-sm-10">
        <input value="vàng khè" name="txtTenMatHang" class="form-control" id="focusedInput" type="text" placeholder="Tên mặt hàng" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Giá bán: </label>
      <div class="col-sm-10">
        <input value="100000" name="txtGiaBan" class="form-control" id="focusedInput" type="number" placeholder="Giá bán" required>
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Hình ảnh: </label>
      <div class="col-sm-10">
        <input name="fileHinhAnh" type="file" class="form-control" required>
      </div>
    </div>

    
    <fieldset enable>
      <div class="form-group">
        <label class="col-sm-2 control-label">Danh mục</label>
        <div class="col-sm-10">
          <select name="selectDanhMuc" id="disabledSelect" class="form-control">
              <option value="">---Chọn danh mục---</option>
            <?php
              foreach($mangDanhMuc as $arr)
              {
            ?>
                <option value="<?php echo $arr['id']; ?>"><?php echo $arr['tendanhmuc']; ?></option>
            <?php
              }
            ?>
          </select>
          <br>
        </div>
      </div>
    </fieldset>
    
    <div class="form-group">
      <label class="col-sm-2 control-label">Mô tả: </label>
      <div class="col-sm-10">
        <textarea name="txtHinhAnh" class="form-control" id="focusedInput" type="file" placeholder="Hình ảnh"> </textarea>
      </div>
    </div>

    <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input name="txtMoTa" type="submit" value="Thêm" class="btn btn-success btn-lg">
        </div>
    </div>
  </form>
</div>
<?php include("../view/bottom.php"); ?>
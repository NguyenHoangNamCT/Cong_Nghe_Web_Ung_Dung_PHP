<?php include("../view/top.php"); ?>
<div class="container">
  <h2>Thêm một mặt hàng</h2>
  <form class="form-horizontal">
    <div class="form-group">
      <label class="col-sm-2 control-label">Tên mặt hàng: </label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" placeholder="Tên mặt hàng">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Giá bán: </label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" placeholder="Giá bán">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-2 control-label">Hình ảnh: </label>
      <div class="col-sm-10">
        <input class="form-control" id="focusedInput" type="text" placeholder="Hình ảnh">
      </div>
    </div>

    
    <fieldset enable>
      <div class="form-group">
        <label class="col-sm-2 control-label">Danh mục</label>
        <div class="col-sm-10">
          <select id="disabledSelect" class="form-control">
            <option>Disabled select</option>
          </select>
          <br>
        </div>
      </div>
    </fieldset>
    
    <div class="form-group">
        <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <input type="submit" value="Thêm" class="btn btn-success btn-lg">
        </div>
    </div>
  </form>
</div>
<?php include("../view/bottom.php"); ?>
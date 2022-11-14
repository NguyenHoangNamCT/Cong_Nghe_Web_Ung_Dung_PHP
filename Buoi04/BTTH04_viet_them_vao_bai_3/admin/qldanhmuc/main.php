<?php 
  include("../view/top.php");
?>

<h2>Quản lý danh mục</h2> 
<div class="container">        

  <table class="table table-striped">
    <thead>
      <tr>
        <th>Tên danh mục</th>
        <th>Sửa</th>
        <th>Xoá</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $tatCaDanhMuc = $dm->laydanhmuc(); 
      foreach($tatCaDanhMuc as $r){
        // var_dump($tatCaDanhMuc);
        if($r['id'] == $idSua){
      ?>
          <form method="post">
            <input type="hidden" name='action' value="capnhat">
            <input type="hidden" name='id' value="capnhat">
            <tr>
                <td><input class="form-control" type="text" name="txtTenDanhMuc" value="<?php echo $r['tendanhmuc']; ?>"></td>
                <td>
                    <input type="submit" class="btn btn-success" style="margin: -6px -12px -6px -12px;" value="Lưu">
                </td>
                <td><a href="?action=xoa&id=<?php echo $r['id']; ?>" class="btn btn-danger">Xoá</a></td>
            </tr>
          </form>
      <?php
        }//đóng của if($r['id'] == $idSua)
        else{
      ?>
        <tr>
          <td><?php echo $r['tendanhmuc']; ?></td>
          <td><a href="?action=sua&id=<?php echo $r['id']; ?>" class="btn btn-warning">Sửa</a></td>
          <td><a href="?action=xoa&id=<?php echo $r['id']; ?>" class="btn btn-danger">Xoá</a></td>
        </tr>
      <?php   
        }//đóng của else
      }//đóng của foreach ?>
    </tbody>
  </table>
  
  <div id="btnThem">
    <a class='btn btn-info'>Thêm danh mục</a>
  </div>
  
  <div id="formThem">
    <form class="form-inline" method="post">
      <input type="text" class="form-control"  name="txtTen" placeholder="Tên danh mục">
      <input type="hidden" name="action" value="them">
      <input type="submit" value="Lưu" class="btn btn-success">
    </form>
  </div>

  <script>
    $(document).ready(function(){
      $("#formThem").hide();
      $("#btnThem").click(function(){
        $("#formThem").toggle();
      });
    });
  </script>
</div>

<?php include("../view/bottom.php"); ?>
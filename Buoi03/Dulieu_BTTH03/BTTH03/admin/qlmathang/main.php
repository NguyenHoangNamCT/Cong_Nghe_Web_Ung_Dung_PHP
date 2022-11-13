<?php include("../view/top.php"); ?>
<h3>Quản lý mặt hàng</h3> 
<br>            
<table class="table table-striped">
<thead>
    <tr>
        <th>Tên hàng</th>
        <th>Giá bán</th>
        <th>Hình ảnh</th>
        <th>Tên danh mục</th>
        <th>Sửa</th>
        <th>Xoá</th>
    </tr>
</thead>
<tbody>
    <?php
    $mangMatHang = $mh->layMatHangVaDanhMuc();
    foreach($mangMatHang as $arr)
    {
        if($arr['id'] == $idSua)
        {
    ?>
            <tr>
                <td><input name='selectCapNhatTenMatHang' type="text" value="<?php echo $arr['tenmathang']; ?>" class="form-control"></td>
                <td><input name='selectCapNhatGiaBan' type="number" value="<?php echo $arr['giaban']; ?>" class="form-control"></td>
                <td>
                    <img width="50" class="img-thumbnail" src="../../<?php echo $arr['hinhanh']; ?>" alt="Khômg tìm thấy">
                    <input type="file" name='fileCapNhat'>
                </td>
                <td>
                    <select name="selectCapNhatDanhMuc" id="" class="form-control">
                                    <option value="">---Chọn danh mục muốn đổi---</option>
                        <?php
                            $danhMuc = new DANHMUC();
                            $mangDanhMuc = $danhMuc->laydanhmuc();
                            foreach($mangDanhMuc as $arrDM){
                                if($arrDM['id'] == $arr['danhmuc_id']){
                                    echo '<option selected value="'.$arr['id'].'">'.$arr['tendanhmuc'].'</option>';
                                }
                                else
                                    echo '<option value="'.$arr['id'].'">'.$arr['tendanhmuc'].'</option>';
                            }
                        ?> 

                    </select>
                </td>
                <td><input type="submit" value="lưu" class="btn btn-success"></td>
                <td><a href="?action=xoa&id=<?php echo $arr['id']; ?>" class="btn btn-danger">Xoá</a></td>
            </tr>
    <?php
        }
        else
        {
    ?>
            <tr>
                <td><?php echo $arr['tenmathang']; ?></td>
                <td><?php echo $arr['giaban']; ?></td>
                <td><img width="50" class="img-thumbnail" src="../../<?php echo $arr['hinhanh']; ?>" alt="Khômg tìm thấy"></td>
                <td><?php echo $arr['tendanhmuc']; ?></td>
                <td><a href="?action=sua&id=<?php echo $arr['id']; ?>" class="btn btn-warning">Sửa</a></td>
                <td><a href="?action=xoa&id=<?php echo $arr['id']; ?>" class="btn btn-danger">Xoá</a></td>
            </tr>
    <?php
        }
    }
    ?>
</tbody>
</table>
<a href="?action=them" class="btn btn-info">Thêm mặt hàng</a>
<?php include("../view/bottom.php"); ?>





<?php
    $link = mysqli_connect('localhost', 'root', 'vertrigo');
    mysqli_select_db($link, 'qlsv_cnw');
    //Thực hiện truy vấn cho bảng lớp
    $resultsL = mysqli_query($link, 'select * from lop');
    if(isset($_POST['nameMSSV']) && isset($_POST['nameHoTen']) && isset($_POST['nameEmail']) && isset($_POST['nameLop'])){
        //$sTruyVan = 'INSERT INTO sinhvien(mssv, hoten, email, lopid) values("$_POST[\"nameMSSV\"]","$_POST[\"nameHoTen\"]","$_POST[\"nameEmail\"]", $_POST["nameLop"])'; làm kiểu này bị lỗi chưa xác định đưỢc nguyên nhân
        $mssv = $_POST['nameMSSV'];
        $hoten = $_POST['nameHoTen'];
        $email = $_POST['nameEmail'];
        $lop = $_POST['nameLop'];
        $sTruyVan = "INSERT INTO sinhvien(mssv, hoten, email, lopid) values('$mssv','$hoten','$email', $lop)";
        if(mysqli_query($link, $sTruyVan))
            header("location:index.php");
    }
    else{

    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
  <h1>Thêm sinh viên</h1>
  <form action="add.php" method="post">
    <div class="form-group">
      <label>MSSV:</label>
      <input class="form-control" type="text" id="idMSSV" name="nameMSSV">
    </div>
    <div class="form-group">
      <label>Họ tên:</label>
      <input class="form-control" type="text" id="idHoTen" name="nameHoTen">
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input class="form-control" type="text" id="idEmail" name="nameEmail">
    </div>
    <div class="form-group">
      <label>Lớp:</label>
      <select name="nameLop" id="idLop" class="form-control">
        <option value="">--Chọn lớp--</option>
        <?php 
            while($row = mysqli_fetch_array($resultsL)){
                echo '
                    <option value="'.$row['id'].'">'.$row['lop'].'</option>
                ';
            }
        ?>
        <option></option>
      </select>
    </div>
    <button type="submit" class="btn btn-default">Thêm</button>
  </form>
</div>
</body>
</html>
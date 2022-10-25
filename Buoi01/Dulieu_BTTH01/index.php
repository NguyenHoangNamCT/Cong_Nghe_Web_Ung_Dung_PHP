<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Quản lý sinh viên</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-2">
        <h1>Lớp</h1>
        <?php 
          $link = mysqli_connect('localhost', 'root', 'vertrigo');
          mysqli_select_db($link, 'qlsv_cnw');
          $resultsL = mysqli_query($link, 'select * from lop');
          while($r = mysqli_fetch_array($resultsL)){
            echo'
              <a class="list-group-item" href="index.php?id='.$r['id'].'">'.$r['lop'].'</a>
            ';
          }
        ?>
      </div>
      <div class="col-sm-8">
        <h1>Danh sách sinh viên</h1>
        <table class="table table-horver">
          <tr>
            <td>MSSV</td>
            <td>Họ tên</td>
            <td>Email</td>
            <td>Lớp</td>
            <td>Thao tác</td>
          </tr>
          <?php
            //Kiểm tra có lớp nào được chọn hay không
            $sTruyVan = 'select sv.*, l.lop from sinhvien sv, lop l where sv.lopid = l.id';
            if(isset($_GET['id'])){
              $sTruyVan .= " and l.id = " . $_GET['id']; 
            }
            $resultsSV = mysqli_query($link, $sTruyVan);
            while($r = mysqli_fetch_array($resultsSV)){
              echo'
                <tr>
                  <td>'.$r['mssv'].'</td>                  
                  <td>'.$r['hoten'].'</td>                  
                  <td>'.$r['email'].'</td>                  
                  <td>'.$r['lop'].'</td>                  
                  <td>
                    <a class="btn btn-warning" href="update.php?id='.$r['id'].'">Sửa</a>  |  
                    <a class="btn btn-danger" href="delete.php?id='.$r['id'].'">Xoá</a></td>
                </tr>
              ';
            }
          ?>
        </table>
        <a class="btn btn-info" href="add.php">Thêm sinh viên</a>
      </div>
      <div class="col-sm-2">
      </div>
    </div>
  </div>
</body>
</html>
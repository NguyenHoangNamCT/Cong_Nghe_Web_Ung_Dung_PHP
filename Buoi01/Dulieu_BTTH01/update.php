<?php //Tại sao biến id khi bấm sửa lại thành biến không xác định? Mỗi lần load lại mọi biến đều thành không xd sao?

    // $link = mysqli_connect('localhost', 'root', 'vertrigo');
    // mysqli_select_db($link, 'qlsv_cnw');
    // //Thực hiện truy vấn cho bảng lớp
    // $resultsL = mysqli_query($link, 'select * from lop');

    // // if(!isset($_GET['id']))// lúc bấm sửa nó vẫn chạy dô đây được
    // //   return;

    // if(isset($_GET['id']))
    //   $id = $_GET['id'];

    // if(isset($_POST['nameMSSV']) && isset($_POST['nameHoTen']) && isset($_POST['nameEmail']) && isset($_POST['nameLop'])){
    //     // $id = $_POST['nameID'];
    //     $mssv = $_POST['nameMSSV'];
    //     $hoten = $_POST['nameHoTen'];
    //     $email = $_POST['nameEmail'];
    //     $lop = $_POST['nameLop'];
    //     //$sTruyVan = "UPDATE sinhvien set mssv = '".$_POST['nameMSSV']."', hoten = '".$_POST['nameHoTen']."', email = '".$_POST['nameEmail']."', lopid = ".$_POST['nameLop']." where id = ".$_GET['id']."";//làm kiểu củ chuổi này mất time mà lỗi không biết đường fix :D
    //     $sTruyVan = "UPDATE sinhvien set mssv ='$mssv', hoten = '$hoten', email = '$email', lopid = '$lop' where id = $id";        
    //     if(mysqli_query($link, $sTruyVan))
    //       header("location:index.php");
    // }
    // else{
    //   $sTruyVan = 'select * from sinhvien where id='.$id;
    //   $sv = mysqli_fetch_array($resultsSV = mysqli_query($link, $sTruyVan));//vì có 1 dòng nên làm vậY luôn cho nhanh
    //   echo var_dump($sv);
    // }
?>

<?php
    $link = mysqli_connect('localhost', 'root', 'vertrigo');
    mysqli_select_db($link, 'qlsv_cnw');
    //Thực hiện truy vấn cho bảng lớp
    $resultsL = mysqli_query($link, 'select * from lop');

    if(isset($_POST['nameMSSV']) && isset($_POST['nameHoTen']) && isset($_POST['nameEmail']) && isset($_POST['nameLop'])){
        $id = $_POST['nameID'];
        $mssv = $_POST['nameMSSV'];
        $hoten = $_POST['nameHoTen'];
        $email = $_POST['nameEmail'];
        $lop = $_POST['nameLop'];
        //$sTruyVan = "UPDATE sinhvien set mssv = '".$_POST['nameMSSV']."', hoten = '".$_POST['nameHoTen']."', email = '".$_POST['nameEmail']."', lopid = ".$_POST['nameLop']." where id = ".$_GET['id']."";//làm kiểu củ chuổi này mất time mà lỗi không biết đường fix :D
        $sTruyVan = "UPDATE sinhvien set mssv ='$mssv', hoten = '$hoten', email = '$email', lopid = '$lop' where id = $id";        
        if(mysqli_query($link, $sTruyVan)){
          header("location:index.php");
        }
    }
    else{
      $sTruyVan = 'select * from sinhvien where id='.$_GET['id'];
      $sv = mysqli_fetch_array($resultsSV = mysqli_query($link, $sTruyVan));//vì có 1 dòng nên làm vậY luôn cho nhanh
      echo var_dump($sv);
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
  <h1>Sửa sinh viên</h1>
  <!-- <?php
    var_dump($id);
    var_dump($sv);
  ?> -->
  <form action="update.php" method="post">
    <input type="hidden" name="nameID"  value="<?php echo $sv['id'];?>"> 
    <div class="form-group">
      <label>MSSV:</label>
      <input class="form-control" type="text" id="idMSSV" name="nameMSSV" value="<?php echo $sv['mssv']; ?>">
    </div>
    <div class="form-group">
      <label>Họ tên:</label>
      <input class="form-control" type="text" id="idHoTen" name="nameHoTen" value="<?php echo $sv['hoten']; ?>">
    </div>
    <div class="form-group">
      <label>Email:</label>
      <input class="form-control" type="text" id="idEmail" name="nameEmail" value="<?php echo $sv['email']; ?>">
    </div>
    <div class="form-group">
      <label>Lớp:</label>
      <select name="nameLop" id="idLop" class="form-control">
        <option value="">--Chọn lớp--</option>
        <?php
            $lopCuaSVCanSua = "";
            while($row = mysqli_fetch_array($resultsL)){
              if($row['id'] == $sv['lopid'])
                $lopCuaSVCanSua = "selected";
              echo '
                  <option '.$lopCuaSVCanSua.' value="'.$row['id'].'">'.$row['lop'].'</option>
              ';
                $lopCuaSVCanSua="";
            }
        ?>
        <option></option>
      </select>
    </div>
    <button type="submit" class="btn btn-default">Sửa</button>
  </form>
</div>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>ABC Shop - Trang quản trị</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    .row.content {height: 900px}
    .sidenav {background-color: #f1f1f1; height: 100%;}
    @media screen and (max-width: 767px) { .row.content {height: auto;} }
  </style>
</head>
<body>
    <div class="container">
    <h2>Đăng nhập</h2>
    <form method="post">
        <!-- Gửi biến action đến index. -->
        <input type="hidden" name="action" value="xuLyDangNhap">
        <!-- ----------------------------------------------- -->
        
        <div class="form-group">
            <label for="email">Email:</label>
            <input name="txtEmail" type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
            <div class="form-group">
            <label for="pwd">Password:</label>
            <input name="txtPassword" type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
        </div>
            <div class="checkbox">
            <label><input name="checkboxRemember" type="checkbox" name="remember"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
    </form>
    </div>
</body>
</html>
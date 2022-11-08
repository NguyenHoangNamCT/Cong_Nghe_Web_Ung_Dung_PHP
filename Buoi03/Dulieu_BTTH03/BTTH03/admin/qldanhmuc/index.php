<?php 
require("../../model/database.php");
require("../../model/danhmuc.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$idSua = 0; //do id sửa tự động tăng và bắt đầu từ 1 nên không có trường hợp bằng 0

$dm = new DANHMUC();

switch($action){
    case "xem":
        include("main.php");
        break;
    case "them":
        if(isset($_POST["txtTen"]))
            $dm->themdanhmuc($_POST["txtTen"]);
        include("main.php");
        break;
    case "xoa":
        if(isset($_GET['id']))
            $dm->xoadanhmuc($_GET['id']);
        include("main.php");
        break;
    case "sua":
        $idSua = $_GET['id'];
        include("main.php");
        break;
    case "capnhat":
        if(isset($_POST['txtTenDanhMuc']) && isset($_POST['id']))
        {
            $dm->suadanhmuc($_GET['id'], $_POST['txtTenDanhMuc']);
            var_dump($action);
        }        
        include("main.php");
        break;
    default:
        break;
}
?>
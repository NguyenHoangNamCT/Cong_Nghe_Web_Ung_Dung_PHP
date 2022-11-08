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
        
        break;
    case "sua":
        break;
    default:
        break;
}
?>

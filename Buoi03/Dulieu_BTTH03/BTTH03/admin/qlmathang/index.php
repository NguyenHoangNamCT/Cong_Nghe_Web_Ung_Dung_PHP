<?php 
require("../../model/database.php");
require("../../model/mathang.php");

// Xét xem có thao tác nào được chọn
if(isset($_REQUEST["action"])){
    $action = $_REQUEST["action"];
}
else{
    $action="xem";
}

$mh = new MATHANG();

switch($action){
    case "xem":

        include("main.php");
        break;
    case "them":
        include("add.php");
        break;
    default:
        break;
}
?>

<?php
session_start();
include_once("functions/Database.php");
if(isset($_GET['p'])){

    $pages = scandir("pages/admin");
    if(in_array($_GET['p'].'.php',$pages)){
        $p=$_GET['p'];
    }else{
        $p = "error";
    }
}else{ header("location:admin.php?p=login");
    exit;
}

$functions = scandir("functions");
if(in_array($p.".func.php",$functions)){
    include("functions/admin/".$p.".func.php");
}


?>

<!DOCTYPE html>
<html>
<head></head>
<link rel="stylesheet" type="text/css" href="assets/admin/admin.css">
<meta charset="UTF-8">
<body>

<?php include("body/admin/topbar.php"); ?>
<?php include("include/_errors.php"); ?>
<?php include("pages/admin/".$p.".php"); ?>

</body>
</html>
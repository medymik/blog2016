<?php
  $p="home";
  if(isset($_GET['p'])){

      $pages = scandir("pages/normal");
      if(in_array($_GET['p'].'.php',$pages)){
          $p=$_GET['p'];
      }else{
        $p = "error";
      }
  }

?>

 <!DOCTYPE html>
     <html>
        <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="assets/normal/css/user.css">
         
        </head>
        <body>
         
        <?php include("body/normal/topbar.php"); ?>
        <?php include("pages/normal/".$p.".php"); ?>
        <?php include("body/normal/bottombar.php"); ?>

        </body>
    </html>
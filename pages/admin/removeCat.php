<?php
   if(isset($_GET["cat"])){
       $db = new Database();
       $db->deleteRow("delete from categorie where categorie=?",[trim($_GET["cat"])]);
       header("Location:admin.php?p=addCategorie");

   }
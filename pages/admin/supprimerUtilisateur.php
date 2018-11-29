<?php
   $db = new Database();

   if(isset($_GET["id"])){
       $rows = $db->getRows("select * from article where idAdmin=?",[$_GET["id"]]);
       for($i=0;$i<count($rows);$i++){
           $db->deleteRow("delete from article_tag where idArticle=?",[$rows[$i][0]]);
           $db->deleteRow("delete from commentaire where idArticle=?",[$rows[$i][0]]);
       }
       $db->deleteRow("delete from article where idAdmin=?",[$_GET["id"]]);



       $db->deleteRow("delete from admin where id=?",[trim($_GET["id"])]);
       header("Location:admin.php?p=listeUtilisateur");
   }
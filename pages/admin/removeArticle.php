<?php
$db = new Database();
if(isset($_GET['id'])) {
    $rows = $db->getRows("select * from article_tag where idArticle = ? ",[$_GET['id']]);
    foreach($rows as $row){
        if($db->deleteRow("delete from article_tag where id = ? ",[$row[0]])){
        }
    }

    $coms = $db->getRows("select * from commentaire where idArticle = ? ",[$_GET['id']]);
    foreach($coms as $row){
        if($db->deleteRow("delete from commentaire where id = ? ",[$row[0]])){
        }
    }

    $db->deleteRow("delete from article where id=?",[$_GET["id"]]);

     header("Location:admin.php?p=listArticle");
}


<?php

include_once("filter/visiteur_filter.php");
$errors =  [];
$success=  [];
$db = new Database();

if(isset($_POST["updateArticle"])){
    if(empty(trim($_POST["titre"]))){
        $errors[]= "Veuillez entrer le titre !";
    }

    if(empty(trim($_POST["contenu"]))){
        $errors[]= "Veuillez entrer le contenu !";
    }

    if(count($errors)==0){
        if($db->insertRow("update article set titre=?,contenu=?,visible=?,idCategorie=? where id=?",[$_POST["titre"],$_POST["contenu"],$_POST['role'],$_POST['categorie'],$_POST["id"]])==true){
            $success[] = "L'article à été bien modifier !";
        }
    }


}

if(isset($_GET['id'])){
    $row;

    $row = $db->getRow("select * from article where id = ? ",[$_GET['id']]);
    $categories = $db->getRows("select * from categorie");}


?><main>
<?php include("include/_errors.php"); ?>
<?php include("include/_success.php"); ?>

<div id="conteneur">
    <h1>La modification d'une article</h1>
    <form method="post">
        <div class="frm-group">
            <label>Titre :</label>
        </div>
        <div class="frm-group">
            <input class="input-article-text" type="text" name="titre"  value="<?= $row["titre"] ?>"/>
        </div>


        <input type="hidden" name="id" value="<?= $row["id"] ?>"/>
        <div class="frm-group">
            <label>Contenu :</label>
        </div>
        <div class="frm-group">
            <textarea cols="90" class="text-area-article" name="contenu"><?= $row["contenu"] ?></textarea>
        </div>

        <div class="frm-group">
            <label>Catégorie :</label>
        </div>

        <div class="frm-group">
            <select class="input-text" name="categorie">
                <?php foreach($categories as $cate){  ?>
                    <option value="<?php echo $cate[0]; ?>"><?php echo $cate[1]; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="frm-group">
            <label>Role</label>
            <input type="radio" name="role" value="1" <?php
            if($row["visible"]=="1") echo "checked";
            ?> /> Visible
            <input   type="radio" name="role" value="0" <?php
            if($row["visible"]=="0") echo "checked";
            ?> /> Caché
        </div>

        <input type="submit" class="btn" name="updateArticle" value="Modifier"/>



    </form>

</div>


<br/><br/><br/><br/><br/><br/>
</main>
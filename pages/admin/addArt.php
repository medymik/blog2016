
<main>
<?php
$errors =  [];
$success=  [];
$db = new Database();
$categories = $db->getRows("select * from categorie");

if(isset($_POST['addArticle'])){

if(empty(trim($_POST['titre']))){
    $errors[] = "Le champs titre obligatoire !";
}

if(empty($_POST['contenu'])){
    $errors[] = "Le champs contenu obligatoire !";
}
$idTags = [];
if(!empty(trim($_POST['tag']))){
    $tags = explode(',',trim($_POST['tag']));

    foreach($tags as $tag){
        $existeTag = $db->getRow("select * from tag where tag=?",[trim($tag)]);

        if(count($existeTag)==1){
            $db->insertRow("insert into tag(tag) VALUES(?)",[trim($tag)]);
        }
        $existeTag = $db->getRow("select * from tag where tag=?",[trim($tag)]);
        $idTags[] = $existeTag['id'];

    }



}

if(isset($_POST['categorie'])){

}else $errors[] = "Veuillez choisir une catégorie !";

?>



<?php include("include/_errors.php"); ?>
<?php include("include/_success.php"); ?>
<div id="conteneur">
    <h1>L'ajout d'une article</h1>
    <form method="post" enctype="multipart/form-data">
        <div class="frm-group">
            <label>Titre :</label>
        </div>
        <div class="frm-group">
            <input class="input-article-text" type="text" name="titre"/>
        </div>

        <div class="frm-group">
            <label>Tag :</label>
        </div>


        <div class="frm-group">
            <input class="input-article-text" type="text" name="tag"/>
        </div>

        <div class="frm-group">
            <label>Contenu :</label>
        </div>
        <div class="frm-group">
            <textarea cols="90" class="text-area-article" name="contenu"></textarea>
        </div>

        <div class="frm-group">
            <label>Image :</label>
        </div>

        <div class="frm-group">
            <input type="file" name="image"/>
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
            <input type="radio" name="role" value="1" checked/> Visible
            <input   type="radio" name="role" value="0" /> Caché
        </div>

        <input type="submit" class="btn" name="addArticle" value="Ajouter"/>



    </form>

</div>


<br/><br/><br/><br/><br/><br/>
</main>
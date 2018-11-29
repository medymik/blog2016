<main>
<?php
include_once("filter/visiteur_filter.php");
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





/********************************************************/
         $path="image/post.png";
          if(!empty($_FILES["image"]["name"])) {

              if (isset($_FILES['image']) ) {

                  $file=$_FILES['image'];
                  $file_name=$file['name'];
                  $file_tmp=$file['tmp_name'];
                  $file_size=$file['size'];
                  $file_error=$file['error'];

                  $file_ext=explode('.', $file_name);
                  $file_ext=strtolower(end($file_ext));

                  $allowed=array('png','jpg','gif','jpeg');

                  if (in_array($file_ext, $allowed)) {
                      if ($file_error===0) {
                          if ($file_size<=2097152) {


                              //$file_name_new='01.'.$file_ext

                              $file_name_new=uniqid('',true).'.'.$file_ext;

                              $file_destination='image/'.$file_name_new;
                              $path = $file_destination;

                              move_uploaded_file($file_tmp, $file_destination);

                              //die("NO-OK");

                          }else $errors[] = "La  taille de l'image trop grand !";
                      }else $errors[] = "Un erreur survenue !";
                  }else $errors[] = "Veuillez télécharger une image valide !";
              }


          }
/********************************************************/

         if(count($errors)==0) {
          //die(Date("Y-m-d H:i:s"));
             if($db->insertRow("INSERT INTO article(titre,contenu,path_image,date,visible,idCategorie,idAdmin)
                  VALUES(?,?,?,?,?,?,?)
          ",[$_POST['titre'],$_POST['contenu'],$path,Date("Y-m-d H:i:s"),$_POST['role'],$_POST['categorie'],trim($_SESSION["admin"][0])])){

                 $idArt = $db->getRow("select * from Article order by date desc limit 0,1");
                 foreach($idTags as $idd){
                     $db->insertRow("insert into article_tag(idArticle,idTag) values(?,?)",[$idArt[0],$idd]);
                 }
                 $success[] = "L'article à été bien ajouter";
             }
         }
   }
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
            </div>
            <div class="frm-group">
                <input type="radio" name="role" value="1" checked/> Visible
                <input   type="radio" name="role" value="0" /> Caché
            </div>

        <input type="submit" class="btn" name="addArticle" value="Ajouter"/>



    </form>

</div>


<br/><br/><br/>
</main>
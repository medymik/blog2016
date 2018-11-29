<main>
<?php
$db = new Database();
$success= [];
$errors= [];
$rows = $db->getRows("select * from categorie");

if(isset($_GET['s'])){
    $success[]= "Catégorie à été bien ajouter !";
}

 if(isset($_POST["addCat"])){
     if(!empty(trim($_POST["categorie"]))){
         extract($_POST);
         $existeCat = $db->getRow("select * from categorie where categorie=?",[trim($categorie)]);

         if(count($existeCat)==1){

         if($db->insertRow("insert into categorie(categorie) VALUES(?)",[trim($categorie)])){
             $success[]= "Catégorie à été bien ajouter !";
             header("Location:admin.php?p=addCategorie&s=1");
         }else $errors[]="Un erreur survenue !";

         }else $errors[]= "Catégorie deja existe";

     }else $errors[] = "Le champ du catégorie est obligatoir";
 }
?>

<?php include("include/_errors.php"); ?>
<?php include("include/_success.php"); ?>
<div id="conteneur">
    <form method="post">
        <div class="frm-group">
            <label>Libellé catégorie:</label>
           
        </div>
        <div class="frm-group">
            
            <input class="input-text" type="text" name="categorie"/>
        </div>
        <div class="frm-group">
            <input type="submit" name="addCat" class="btn" value="Ajouter"/>
        </div>
    </form>
    <table id="tableAdmin" border="1">
        <thead>
        <tr>
            <th>Catégorie</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($rows as $row){  ?>
            <tr>
                <td>
                    <?=  $row["categorie"];  ?>
                </td>


            </tr>
        <?php }  ?>
        </tbody>
    </table>
    </div>
    </main>
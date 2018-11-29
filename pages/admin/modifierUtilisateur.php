<?php

     include_once("filter/visiteur_filter.php");
     $db = new Database();
    $errors = [];
   if(isset($_POST["btnModifierUser"])){

       if(!empty(trim($_POST["mdp"]))){



           //vérification de mot de passe
           if(mb_strlen(trim($_POST["mdp"]))<6){
               $errors[] = "Veuillez entrer un mot de passe valide !";
           }




               if(count($errors)==0){
                   extract($_POST);
                   try{
                       if($db->updateRow("update admin set mdp=?,estAdmin=? where id=?",[$mdp,$role,$id])) {
                           $success[] = "Le compte à été bien modifier !";
                       }
                   }catch (PDOException $e){
                       $errors[]= "Un erreur survenue !"+$e;
                   }


               }





       }else $errors[]= "Veuillez remplire tous les champs !";


   }


$row;
if(isset($_GET["id"])){
    $row = $db->getRow("select * from Admin where id =?",[trim($_GET["id"])]);

    if(count($row)!=1){

    }else header("location:admin.php?p=updateModo");

}else header("location:admin.php?p=updateModo");

?>
<main>
<form method="post">

    <div class="frm" >
        <h1 class="frm-h1">Modification d'un compte utilisateur</h1>
        <input type="hidden" name="id" value="<?= $row["id"];?>"/>
        <div class="frm-group">
            <label>Pseudo</label>
            <input class="input-text" type="text" name="pseudo" value="<?= $row["pseudo"];?>" disabled="disabled"/>
        </div>

        <div class="frm-group">
            <label>Email</label>
            <input class="input-text" type="text" name="email" value="<?= $row["email"];?>" disabled="disabled"/>
        </div>

        <div class="frm-group">
            <label>Mot de passe</label>
            <input class="input-text" type="password" name="mdp" value="<?= $row["mdp"];?>"/>
        </div>

        <div class="frm-group">
            <label>Role</label>

            <input type="radio" name="role" value="1" <?php if ($row["estAdmin"]=="1") echo "Checked"; else echo ""; ?> /> Admin
            <input   type="radio" name="role" value="0" <?php if ($row["estAdmin"]=="0") echo "Checked"; else echo ""; ?> /> Modérateur
        </div>

        <input type="submit" name="btnModifierUser" class="btn" value="Modifier"/>



    </div>
</form>


<?php include("include/_errors.php"); ?>
<?php include("include/_success.php"); ?>

</main>
<main>
<?php
        include_once("filter/visiteur_filter.php");

        $errors=[];
        $success=[];
         $db = new Database();
   if(isset($_POST["addModo"])){
       if(!empty(trim($_POST["pseudo"])) && !empty(trim($_POST["email"])) && !empty(trim($_POST["mdp"]))){


           //vérification de pseudo
           if(!preg_match("/^[A-Za-z0-9]{4,}$/",trim($_POST["pseudo"]))){
               $errors[] = "Veuillez entrer un pseudo valide !";
           }




           //vérification de mot de passe
           if(mb_strlen(trim($_POST["mdp"]))<6){
               $errors[] = "Veuillez entrer un mot de passe valide !";
           }

           //vérification email
           if(!filter_var(trim($_POST["email"]),FILTER_VALIDATE_EMAIL)){
               $errors[] = "Veuillez entrer un email valide !";
           }


           //vérification de pseudo et l'email a la base de donnees
           if(count($errors)==0){


               $row = $db->getRow("select * from admin where pseudo=?",[$_POST["pseudo"]]);
               if($row>0){
                   $errors[] = "Le pseudo déja existe !";
               }

               $row = $db->getRow("select * from admin where email=?",[$_POST["email"]]);
               if($row>0){
                   $errors[] = "L'adresse email déja existe !";
               }
           }

           //insertion a la base de données
           if(count($errors)==0){
               extract($_POST);
               try{
               if($db->insertRow("insert into admin(email,mdp,estAdmin,pseudo) values(?,?,?,?)",[$email,$mdp,$role,$pseudo])) {
                  $success[] = "Le compte à été bien créé !";
               }
                }catch (PDOException $e){
                   $errors[]= "Un erreur survenue !"+$e;
               }


           }


       }else $errors[]= "Veuillez remplire tous les champs !";
   }
?>

<form method="post">

    <div class="frm" >
        <h1 class="frm-h1">Création d'un compte modérateur</h1>
        <div class="frm-group">
            <label>Pseudo</label>
            <input class="input-text"  type="text" name="pseudo"/>
        </div>

        <div class="frm-group">
            <label>Email</label>
            <input class="input-text" type="text" name="email"/>
        </div>

        <div class="frm-group">
            <label>Mot de passe</label>
            <input class="input-text" type="text" name="mdp"/>
        </div>

        <div class="frm-group">
            <label>Role</label>
            <input type="radio" name="role" value="1" /> Admin
            <input   type="radio" name="role" value="0" checked/> Modérateur
        </div>

        <input type="submit" name="addModo" class="btn" value="Ajouter"/>



    </div>
</form>
<br/>
 <br/>

<?php include("include/_errors.php"); ?>
<?php include("include/_success.php"); ?>
</main>
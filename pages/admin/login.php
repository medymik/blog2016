
<?php
   include_once "functions/Database.php";
   include_once "filter/auth_filter.php";
   $errors = [];
   if(isset($_POST['connect'])){
         if(!empty(trim($_POST["nom"])) && !empty(trim($_POST["mdp"]))){

             //vérification de pseudo
             if(!preg_match("/^[A-Za-z0-9]{4,}$/",trim($_POST["nom"]))){
                 $errors[] = "Veuillez entrer un pseudo valide !";
             }
             //vérification de mot de passe
             if(mb_strlen(trim($_POST["mdp"]))<6){
                 $errors[] = "Veuillez entrer un mot de passe valide !";
             }


         }else{
             $errors[] = "Veuillez remplire tous les champs !";
         }


         if(count($errors)==0){
             extract($_POST);
             $db = new Database();
             $row = $db->getRow("select * from admin where pseudo=? and mdp=?",[$nom,$mdp]);
             if(count($row)>1){
                 $_SESSION["admin"] = $row;
                 header("location:admin.php?p=compte");
             }else $errors[] = "Les information d'authentification invalide !";
         }



   }
?>

<!DOCTYPE html>
    <html>
      <head>
          <meta charset="utf-8"/>
          <title>Authentification</title>
          <link rel="stylesheet" href="assets/admin/admin.css"/>
      </head>
      <body>

      <main class="login">
      <?php include("include/_errors.php"); ?>

          <form method="post">
          <div class="frm">
          <h1 class="frm-h1"><span>Panel d'administration</span></h1>
              <div class="frm-group">
                  <label style="width: 35%;">Pseudo</label>
                  <input class="input-text" type="text" name="nom"/>
              </div>

              <div class="frm-group">
              <label style="width: 35%;">Mot de passe</label>
              <input class="input-text" type="password" name="mdp"/>
              </div>

              <input type="submit" id="btnSauth"name="connect" value="S'authentifier" class="btn" style="float: right;margin-right: 45px;" />

              <div style="clear: both;"></div>

          </div>

          </form>
      </body>
</main>
</html>
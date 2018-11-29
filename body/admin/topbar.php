<?php
$db = new Database();
             
              $row = $db->getRow("select WEBSITENAME from config");

if(isset($_SESSION["admin"]) && $_SESSION["admin"]["estAdmin"]==1){

?>

<header id="header1">
    <nav id="admin">
       <ul>
           <li><a href="admin.php?p=addArticle"><span>Créé un article</span></a></li>
           <li><a href="admin.php?p=listArticle"><span>Liste des articles</span></a></li>

           <li><a href="admin.php?p=logout"><span>Déconnexion</span></a></li>
       </ul>
    </nav>

    <nav id="admin">
        <ul>
            <li><a href="admin.php?p=createModo"><span>Créé un utilisateur</<span></a></li>
            <li><a href="admin.php?p=listeUtilisateur"><span>Liste des utilisateurs</span></a></li>
            <li><a href="admin.php?p=addCategorie"><span>Ajouter une catégorie</span></a></li>
            <li><a href="admin.php?p=config"><span>config</span></a></li>

        </ul>
       
    </nav>
<div class="logo">
            <h2><?php echo $row[0]; ?></h2>
        </div>
</header>


<?php }
    else if(isset($_SESSION["admin"]) && $_SESSION["admin"]["estAdmin"]==0) {
?>
 <header id="header2">
            <nav id="admin">
                <ul>
                    <li><a href="admin.php?p=addArticle"><span>Créé un article</span></a></li>
                    <!--li><a href="admin.php?p=removeArticle"><span>Supprimer un article</span></a></li>
                    <li><a href="admin.php?p=modifierArticle"><span>Modifier un article</span></a></li-->
                    <li><a href="admin.php?p=listArticle"><span>Afficher un article</span></a></li>
                    <li><a href="admin.php?p=logout"><span>Déconnexion</span></a></li>

                </ul>
            </nav>
            <div class="logo">
            <h2><?php echo $row[0]; ?></h2>
        </div>
            </header>



<?php  } ?>
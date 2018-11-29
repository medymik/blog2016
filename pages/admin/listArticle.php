<main>

<?php

  $db = new Database();
  $rows = $db->getRows("select
        article.id,
        article.titre,
        article.date,
        article.visible,
        categorie.categorie,
        admin.pseudo
        from article,admin,categorie
        where article.idAdmin = admin.id
        and article.idCategorie = categorie.id
       ");

if(isset($_POST['getPost'])){
    $req = "select
        article.id,
        article.titre,
        article.date,
        article.visible,
        categorie.categorie,
        admin.pseudo
        from article,admin,categorie where article.idAdmin = admin.id
    and article.idCategorie = categorie";
    $ii=0;
    if(!empty(trim($_POST['id']))) {

        $req += " and article.id=".trim($_POST['id']);

    }
    if(!empty(trim($_POST['pseudo']))) {
        $req += " and admin.pseudo=".$_POST['pseudo'];
    }

           if(!empty(trim($_POST['titre']))) {
          $req += " and titre=".$_POST['titre'];
        }


        $rows =  $db->getRows($req);
}
?>
<div id="conteneur">
    <table id="tableAdmin" border="1">
        <thead>
        <tr>
            <th>Identifiant</th>
            <th>Titre</th>
            <th>Date création</th>
            <th>Visible</th>
            <th>Catégorie</th>
            <th>Auteur</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($rows as $row){  ?>
            <tr>
                <td>
                     <?= $row[0];?>
                </td>
                <td>
                    <?= $row[1];?>
                </td>
                <td>
                    <?= $row[2];?>
                </td>
                <td>
                    <?= $row[3];?>
                </td>
                <td>
                    <?= $row[4];?>
                </td>
                <td>
                    <?= $row[5];?>
                </td>
                <td>
                    <a href="admin.php?p=modifierArticle&id=<?=  $row[0];  ?>">Modifier</a>
                </td>
                <td>
                    <a href="admin.php?p=removeArticle&id=<?=  $row[0];  ?>">Supprimé</a>
                </td>

            </tr>
        <?php }  ?>
        </tbody>
    </table>
</div>
</main>


<main>

<?php
    include_once("filter/visiteur_filter.php");
    $db = new Database();
    $rows = $db->getRows("select * from Admin");
    $success= [];

    if(isset($_POST["getUser"])){
        extract($_POST);
        $req = "select * from Admin where pseudo like '%$pseudo%' and email like '%$email%'";

        $rows = $db->getRows($req);



    }

?>

<div id="conteneur">
    <form method="post">
    <div class="frm-group">
        <label>Pseudo :</label>
        <input class="input-text" type="text" name="pseudo"/>
    </div>

    <div class="frm-group">
        <label>Email :</label>
        <input class="input-text" type="text" name="email"/>
    </div>

    <div class="frm-group">

        <input type="submit" name="getUser" class="btn" value="Rechercher"/>
    </div>
    </form>

    <table id="tableAdmin" border="1" class="container">
        <thead>
        <tr>
            <th>Pseudo</th>
            <th>Email</th>
            <th>Mot de passe</th>
            <th>estAdmin</th>

        </tr>
        </thead>
        <tbody>
        <?php foreach($rows as $row){  ?>
        <tr>
            <td>
                <?=  $row["pseudo"];  ?>
            </td>
            <td>
                <?=  $row["email"];  ?>
            </td>
            <td>
                <?=  $row["mdp"];  ?>
            </td>
            <td>
                <?=  $row["estAdmin"];  ?>
            </td>
            <td>
                <a href="admin.php?p=modifierUtilisateur&id= <?=  $row["id"];  ?>">Modifier</a>
            </td>
            <td>
                <a href="admin.php?p=supprimerUtilisateur&id= <?=  $row["id"];  ?>">Supprimé</a>
            </td>

        </tr>
        <?php }  ?>
        </tbody>
    </table>
</div>

</main>
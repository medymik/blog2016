<header>

    <nav id="admin">
        <ul>
       
        <?php
            include_once("functions/Database.php");
              $db = new Database();
              $cat = $db->getRows("select * from categorie");
              $row = $db->getRow("select WEBSITENAME from config");
              for ($i=0; $i < count($cat) ; $i++){ 

        ?>
            <li><a href="index.php?p=catigorie&idcat=<?= $cat[$i][0]; ?>"><span><?= $cat[$i][1]; ?></span></a></li>
       

        <?php } ?>
           
       

        </ul>
    </nav>
    <div class="logo">
            <h2><?php echo $row[0]; ?></h2>
        </div>
</header>
 
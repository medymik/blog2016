<main>



<?php
   $idpost=0;
    if (isset($_GET['idpost']) && !empty($_GET['idpost'])) {
      $idpost=$_GET['idpost'];
    }
    else{
     header("location:index.php");
    }

    if (isset($_POST['btnSendCommanate'])) {
      if (!empty($_POST['Comantaire_Visiteur'] )&& !empty($_POST['Nom_Visiteur'])) {
        
      
         $sql2="INSERT INTO commentaire(nom,date,idArticle,contenu) VALUES(?,?,?,?)";
         $inser = $db->insertRow($sql2,[$_POST['Nom_Visiteur'],Date("Y-m-d H:i:s"),$idpost,$_POST['Comantaire_Visiteur']]);
         $h = "Location:index.php?p=post&idpost=".$idpost;
         header($h);
         }
         
    }
        $sql="SELECT titre,date,contenu,path_image,idCategorie FROM article WHERE id=? and visible='1'";
        $post = $db->getRow($sql,[$idpost]);
?>
  <h2><?=$post[0]?></h2>
  <em>le <?=$post[1]?></em>
<br>
  <div class="article__contenu">
  <div class="article__contenu1">
     <img src="<?=$post[3]?>">
     <p><?=nl2br($post[2])?></p>
  </div>






 <div class="commentaire__numbre">
 <?php 
      $sql2="SELECT COUNT(*) FROM commentaire WHERE idArticle=?";
       $nbrCommantaire = $db->getRow($sql2,[$idpost]);
  ?>
   <h4><?= $nbrCommantaire[0] ?> commentaires </h4>
 </div>


 




<div class="commentaireWA">
<?php 
if ($nbrCommantaire[0] !=0) {

    $sql3="SELECT nom,date,contenu FROM commentaire WHERE idArticle=?";
    $Commantaire = $db->getRows($sql3,[$idpost]);
    for ($i=0; $i < count($Commantaire); $i++) {  
 ?>


<div class="comment-body">
        <div class="comment-author vcard">
              <img alt="" src="assets/normal/images/com.png"  class="avatar " height="80" width="80" >    
              <cite class="fn"><?=$Commantaire[$i][0] ?></cite> <span class="says">says:</span>
           </div>
    
            <div class="comment-meta commentmetadata">
             <?=$Commantaire[$i][1] ?>
          </div>

            <p><?=$Commantaire[$i][2] ?></p>

            <!--div class="reply">
                <a rel="nofollow" class="comment-reply-link" href="" onclick="" aria-label="Reply to Mick Kennys">Reply</a>
             </div-->
    </div>









<?php }}?>

</div>






<div class="frm_commentaire">
    <form method="post">
         <div class="row">
           
          <input type="text" name="Nom_Visiteur" placeholder="Votre nom *">
            
         </div>

          <div class="row">
           <textarea name="Comantaire_Visiteur" placeholder="Votre Commantaire *" rows="7"></textarea>
         </div>
         
          <div class="row">
           
           <input type="submit" name="btnSendCommanate" value="Envoyer" style="float: right;">
         </div>

    </form>
    

</div>

  </div>

<div class="article__aside_bar">
    
    <div class="card__container">
    <?php  
        $sql4="SELECT titre,id FROM article WHERE idCategorie=? and visible='1' LIMIT 0,7";
        $Sousarticle = $db->getRows($sql4,[$post[4]]);
        
        for ($i=0; $i < count($Sousarticle); $i++) {  
    ?>
        <div class="w3-card-4 w3-margin" >
               <header class="w3-container w3-light-grey">
                   <h3><?=$Sousarticle[$i][0];?></h3>
                </header>
                 <a  href="index.php?p=post&idpost=<?=$Sousarticle[$i][1];?>" class="w3-btn-block w3-dark-grey">+Voir le contenu</a>
        </div>
   
   <?php } ?>
   </div>
</div>
<div style="clear: both;"></div>





</main>
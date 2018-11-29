 <main>
<?php
                                                            
         $Scat=0;
       
              if (isset($_GET['idcat'])) {
                       $Scat=$_GET['idcat'];
              }

          if (isset($_POST['btn__sreach'])) {
           
                  $sql="SELECT article.id,article.titre,article.path_image FROM article,article_tag,tag WHERE article.id=article_tag.idArticle and article_tag.idTag=tag.id and tag.tag=? and article.visible='1' LIMIT 0,8 ";
                  $articles = $db->getRows($sql,[$_POST['search']]);
                 

          }
          else{
              $sql="SELECT id,titre,path_image FROM article WHERE idCategorie=? and visible='1' LIMIT 0,8";
              $articles = $db->getRows($sql,[$Scat]);

          }

           

              for ($i=0; $i < count($cat) ; $i++){ 
                        if ($Scat==$cat[$i][0]) {
        ?>

                      <h3 class="catigorie__H3"><?=$cat[$i][1];?></h3>

                      <div  class="search__cat">
                            <form  method="post" accept="">

                              <input type="search" name="search" placeholder="Rechercher.."> 
                              <input type="submit" name="btn__sreach" value="Rechercher">
                            </form>
                      </div>

              <?php  }}?>
<hr style=" clear: both;">
<div class="warrapper">       
<div class="card__container">
 <?php
              
              for ($j=0; $j < count($articles) ; $j++){
 ?>

  
 <div class="w3-card-4 w3-margin" >
           <header class="w3-container w3-light-grey">
             <h3><?=$articles[$j][1];?></h3>
           </header>

        <div class="w3-container">
          <div class="card-container">
                <div id="img-card">
                   <img src="<?=$articles[$j][2];?>" alt="Avatar" style="width:100%;height:150px; ">
                </div>
             
          </div>
        </div>
     
        <a  href="index.php?p=post&idpost=<?=$articles[$j][0];?>" class="w3-btn-block w3-dark-grey">+Voir le contenu</a>
</div>

 <?php
}

 ?>
 
</div>






</div><div style=" clear: both;"></div>

</main>
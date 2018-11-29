<main>

        <?php
              for ($i=0; $i < count($cat) ; $i++){ 
        ?>

<h3><a href="index.php?p=catigorie&idcat=<?=$cat[$i][0];?>"><?=$cat[$i][1];?></a></h3>
<hr>
<div class="card__container">
 <?php
               $sql="SELECT id,titre,path_image FROM article WHERE idCategorie=? and visible='1' LIMIT 0,4 ";
              $articles = $db->getRows($sql,[$cat[$i][0]]);
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
     
        <a  href="index.php?p=post&idpost=<?=$articles[$j][0];?>" class="w3-btn-block w3-dark-grey">+Lire la suite</a>
</div>

 <?php
}}

 ?>
 
</div>

</div><div style=" clear: both;"></div>







</main>
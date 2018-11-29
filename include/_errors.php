<?php

   if(isset($errors) && count($errors)!=0){
       echo '<div class="errors">';
       foreach($errors as $err){
           echo '<p>'.$err.'</p>';
       }
       echo '</div>';
   }
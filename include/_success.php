<?php

if(isset($success) && count($success)!=0){
    echo '<div class="success">';
    foreach($success as $err){
        echo '<p>'.$err.'</p>';
    }
    echo '</div>';
}
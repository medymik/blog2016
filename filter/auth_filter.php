<?php
/**
 * Created by PhpStorm.
 * User: Ymik
 * Date: 11/05/2016
 * Time: 17:21
 */

if(isset($_SESSION["admin"])){
    header("Location:admin.php?p=compte");
}
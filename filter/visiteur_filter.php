<?php
/**
 * Created by PhpStorm.
 * User: Ymik
 * Date: 11/05/2016
 * Time: 16:45
 */

if(!isset($_SESSION["admin"])){
    header("Location:admin.php?p=login");
}
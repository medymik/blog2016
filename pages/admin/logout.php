<?php
/**
 * Created by PhpStorm.
 * User: Ymik
 * Date: 11/05/2016
 * Time: 16:43
 */

session_destroy();
unset($_SESSION['user']);
header("Location: admin.php?p=login");


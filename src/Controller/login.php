<?php
require '../../vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

use Tchat2\Repository\UserRepository;

if(!isset($_POST['login'])|| !isset($_POST['password'])){
    header("Location:../../login.php?test=1");
    die();
}

$login = $_POST['login'];
$password = $_POST['password'];


if($user = UserRepository::getInstance()->checkAuthentication($login,$password)){
    session_start();
    
    $_SESSION['userId'] = 1;
    header("Location:../../index.php");
    die();
}

header("Location:../../login.php?test=2");
die();





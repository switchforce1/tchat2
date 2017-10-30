<?php
require 'vendor/autoload.php';
use Tchat2\Repository\UserRepository;

if(isset($_POST['login']) && isset($_POST['password'])){
    $login = $_POST['login'];
    $password = $_POST['password'];
    if($user = UserRepository::getInstance()->checkAuthentication($login,$password)){
        //session_start();
        $_SESSION['userId'] = 2;
    }
}

if(!isset($_SESSION['userId'])){
        header("Location:login.php");
        die();
    }


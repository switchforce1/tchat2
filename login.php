<!DOCTYPE html>
<?php
require 'vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

use Tchat2\Helper\HtmlRender;
use Tchat2\Form\LoginForm;

echo LoginForm::tostring();


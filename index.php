<!DOCTYPE html>
<?php
require 'vendor/autoload.php';
use Tchat2\Model\Repository\UserRepository;
use Tchat2\Model\Repository\MessageRepository;
use Tchat2\Helper\HtmlRender;
use Tchat2\Form\MessageForm;

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

include 'security.php';
?>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content=" tchat">
        <meta name="author" content="">

        <title>T-chat</title>

        <!-- Bootstrap core CSS -->
        <link href="src/resources/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    </head>

    <body>
        <div class="jumbotron text-center">
         <h1>Tchat</h1>
         <p>Site de chat de test</p>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <h3>Utilisateurs</h3>
                    <div>
                        <?php 
                            echo HtmlRender::generateUserTable( array('id','Nom','Login','action'), UserRepository::getInstance()->findAll());
                         ?>
                    </div>
                </div>
              <div class="col-sm-4">
                    <h3>Messages</h3>
                    <div>
                        <?php 
                            $receiver = (isset($_GET['receiver']))?$_GET['receiver']:null;
                            if($receiver){
                                echo MessageForm::tostring($_SESSION['userId'],$receiver);
                            }
                            echo HtmlRender::generateMessageTable( array('id','Contenue','Action'), MessageRepository::getInstance()->findItemOf($_SESSION['userId'], $receiver), $receiver);
                         ?>
                    </div>
              </div>
              <div class="col-sm-4">
                    <h3>detaills</h3>
                    <div>
                        <?php 
                            $message = (isset($_GET['message']))?$_GET['message']:null;
                            if($message){
                                echo HtmlRender::generateMessageDescription($message);
                            } else {
                                echo 'pas de message';
                            }
                         ?>
                    </div>
              </div>
            </div>
        </div> 
    </body>
</html>    
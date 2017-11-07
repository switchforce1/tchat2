<?php
require '../../vendor/autoload.php';
/*error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);*/

use Tchat2\Model\Message;
use Tchat2\Model\Repository\MessageRepository;

if (!isset($_POST['sender']) || !isset($_POST['receiver']) && isset($_POST['content'])){
    header("Location:../../index.php");
    die();
}

$message = new Message();
$message->setContent($_POST['content'])
    ->setSender($_POST['sender'])
    ->setReceiver($_POST['receiver']);

MessageRepository::getInstance()->save($message);

header("Location:../../index.php?receiver=".$_POST['receiver']);
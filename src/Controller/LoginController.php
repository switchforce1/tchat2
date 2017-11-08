<?php

namespace Tchat2\Controller;

use Tchat2\Model\Message;
use Tchat2\Model\Repository\MessageRepository;
use Tchat2\Model\Repository\UserRepository;
/**
 * Description of ChatController
 *
 * @author switchforce1
 */
class LoginController extends AbstractController
{
    /**
     * Basic index
     */
    public function loginAction($login,$password)
    {
        if($user  = UserRepository::getInstance()->checkAuthentication($login,$password)){
            session_start();
            var_dump("Ici mme ");
            $_SESSION['userId'] = $user;
            $controller  = new ChatController();
            $controller->indexAction();
            die();
        }
        
        echo $this->render('login.twig', array('message'  => "Authentication failed"));
    }
    
    
}

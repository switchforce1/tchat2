<?php

namespace Tchat2\Form;

/**
 * Description of LoginForm
 *
 * @author switchforce1
 */
class LoginForm
{
    /**
     * 
     * @return string
     */
    public static function tostring()
    {
        $header = '<form method="post" action="index.php">';
        $login = '<input type="text" class="form-control" name="login" required="true" /> <br/>';
        $password = '<input type="password" name="password" class="form-control" required="true"/> <br/>';
        $submit = '<input type="submit" value="Connexion" class="btn btn-control">';
        $foot = '</form>';
        
        return $header.$login.$password.$submit.$foot;
    }
    
}
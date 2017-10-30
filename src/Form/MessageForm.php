<?php

namespace Tchat2\Form;

/**
 * Description of MessageForm
 *
 * @author switchforce1
 */
class MessageForm
{
    /**
     * 
     * @return string
     */
    public static function tostring($senderId, $receiverId)
    {
        $header = '<form method="post" action="src/Controller/chat.php">';
        $sender = '<input type="hidden" name="sender" value="'.$senderId.'"  required="true"/> <br/>';
        $receiver = '<input type="hidden" name="receiver" value="'.$receiverId.'"   required="true" /> <br/>';
        $content = '<input type="text" name="content"class="form-control" required="true" /> <br/>';
        $submit = '<input type="submit" value="Envoyer" class="btn btn-control">';
        $foot = '</form>';
        
        return $header.$sender.$receiver.$content.$submit.$foot;
    }
}
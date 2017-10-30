<?php
namespace Tchat2\Helper;

use Tchat2\Repository\MessageRepository;
use Tchat2\Repository\UserRepository;
/**
 * Description of HtmlRender
 *
 * @author ubuntu
 */
class HtmlRender
{
    /**
     * 
     * @param array $header
     * @param array $content
     */
    public static function generateTable($header, $content)
    {
        $_top = '<table>';
        $_header = '<tr>';
        $_content = '';
        foreach ($header as $key => $value) {
            $_header .= '<td>'.$value.'</td>';
        }
        $_header .= '/<tr>';
            
        foreach ($content as $line){
            $_content .= '<tr>';
            foreach ($line as $key => $value) {
                $_content .= '<td>'.$value.'</td>';
            }
            $_content .= '/<tr>';
        }
        
        $_end = '</table>';
        
        return $_top.$_header.$_content.$_end;
    }
    
    /**
     * 
     * @param type $header
     * @param type $content
     * @return type
     */
    public static function generateUserTable($header, $content)
    {
        $_top = '<table class="table dataTable">';
        $_header = '<tr>';
        $_content = '';
        foreach ($header as $key => $value) {
            $_header .= '<td>'.$value.'</td>';
        }
        $_header .= '</tr>';
        foreach ($content as $line){
            $_content .= '<tr>';
            $_content .= '<td>'.$line->getId().'</td>';
            $_content .= '<td>'.$line->getName().'</td>';
            $_content .= '<td>'.$line->getLogin().'</td>';
            $_content .= '<td>'.'<a href="index.php?receiver='.$line->getId().'"> Ecrire à </a></td>';
            $_content .= '</tr>';
        }
        $_end = '</table>';
        
        return $_top.$_header.$_content.$_end;
    }
    
    /**
     * 
     * @param type $header
     * @param type $content
     * @return type
     */
    public static function generateMessageTable($header, $content,$receiver)
    {
        $_top = '<table  class="table dataTable">';
        $_header = '<tr>';
        $_content = '';
        foreach ($header as $key => $value) {
            $_header .= '<td>'.$value.'</td>';
        }
        $_header .= '/<tr>';
            
        foreach ($content as $line){
            $_content .= '<tr>';
            $_content .= '<td>'.$line->getId().'</td>';
            $_content .= '<td>'.substr($line->getContent(), 0, 10).'...</td>';
            $_content .= '<td> <a href="index.php?receiver='.$receiver.'&message='.$line->getId().'">Details</a></td>';
            $_content .= '</tr>';
        }
        
        $_end = '</table>';
        
        return $_top.$_header.$_content.$_end;
    }
    
    /**
     * 
     * @param type $id
     * @return string
     */
    public static function generateMessageDescription($id)
    {
        $message = MessageRepository::getInstance()->findById($id);
        $sender  = UserRepository::getInstance()->findById($message->getSender());
        $receiver  = UserRepository::getInstance()->findById($message->getReceiver());
        
        $data = '<div class="">';
        $data .= "De  : ".$sender->getName()."<br>";
        $data .= "A  : ".$receiver->getName()."<br>";
        $data .= "Message  : ".$message->getContent()."<br>";
        $data .= "</div>";
        
        return $data;
    }
    
}
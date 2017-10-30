<?php
namespace Tchat2\Model;

use Tchat2\Config\DataBaseConnexion;

/**
 * Message Class
 *
 * @author switchforce1
 */
class Message extends AbstractModel
{
    /**
     *
     * @var int 
     */
    private $id;

    /**
     *
     * @var string 
     */
    private $content;
    
    /**
     *
     * @var User 
     */
    private $sender;
    
    /**
     *
     * @var User 
     */
    private $receiver;
    
    /**
     * 
     * @return type
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * 
     * @return type
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * 
     * @param type $content
     * @return $this
     */
    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }

    /**
     * 
     * @return User
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set sender
     * 
     * @return $this
     */
    public function setSender($sender)
    {
        $this->sender = $sender;
        return $this;
    }

    /**
     * Get receiver
     * 
     * @return User
     */
    public function getReceiver()
    {
        return $this->receiver;
    }

    /**
     * Sets the receiver
     * 
     * @return $this
     */
    public function setReceiver($receiver)
    {
        $this->receiver = $receiver;
        return $this;
    }

    /**
     * 
     * @param \Tchat2\Model\ModelInterface $model
     */
    public function create()
    {
        $query = "INSERT INTO message (content, sender, receiver)
        VALUES ('".$this->getContent()."', '".$this->getSender()."',"
            . " '".$this->getReceiver()."')";
        
        DataBaseConnexion::getConnexion()->exec($query);
    }

    /**
     * 
     * @param \Tchat2\Model\ModelInterface $model
     */
    public function update()
    {
        
    }

}
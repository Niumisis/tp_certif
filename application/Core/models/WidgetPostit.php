<?php
/**
 * Modèle de domaine WidgetPostit du module ZF  'Core'
 * 
 * Ce modèle représente un mémo créé par l'utilisateur
 *
 * @category   Application
 * @package    Application_Core
 * @desc       Modèle de domaine WidgetPostit du module ZF  'Core'
 * @author     Jean-Baptiste MONIN   <jb.monin@cleo-consulting.fr>
 * @copyright  2012 CLEO CONSULTING
 * @version    0.1
 * @since      2012-09-10
 */
class Core_Model_WidgetPostit implements Core_Model_Interface
{   
    /**
    * @var smallint(5) unsigned
    */
    private $id;
    /**
     * @var Core_Model_User
     */
    private $user;
    /**
    * @var varchar(120)
    */
    private $content;
    /**
    * @var datetime
    */
    private $timestamp;


    public function setId($id)
    {
        if (0 === (int) $id) {
            throw new DomainException('core_widget_postit_invalid_id');
        }
        $this->id = (int) $id;
        return $this;
    }

    public function getId()
    {
        return (int) $this->id;
    }

    /**
     * @return the value of $user
     */
    public function getUser()
    {
        return $this->user;
    }

	/**
     * @param Core_Model_User $user
     */
    public function setUser(Core_Model_User $user)
    {
        $this->user = $user;
        return $this;
    }

	public function setContent($content)
    {

        $filter = new Zend_Filter_StripTags();
        $content = $filter->filter($content);

        if ('' === $content)
            throw new DomainException('core_widget_postit_exception_content_empty');

        $maxLength = new Zend_Validate_StringLength(array('max' => 120));
        if (!$maxLength->isValid($content))
            throw new DomainException('core_widget_postit_exception_content_too_long');

        $this->content = (string) $content;
        return $this;
    }

    public function getContent()
    {
        $filter = new Zend_Filter_StripTags();
        $this->content = $filter->filter($this->content);
        
        return $this->content;
    }

    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
        return $this;
    }

    public function getTimestamp()
    {
        return $this->timestamp;
    }

    public function toArray()
    {
        return array(
            'id' => $this->getId(),
            'user' => $this->getUser()->getLogin(),
            'content' => $this->getContent(),
            'timestamp' => $this->getTimestamp()
        );
    }
}
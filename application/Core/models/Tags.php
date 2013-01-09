<?php

/**
*  Objet de domaine : tp_tags
*  Représente une entité de domaine : tp_tags
*/

/**
*  Objet de domaine : tp_tags
*  Représente une entité de domaine : tp_tags
*
*  @package Core
*  @subpackage Model
*  @example <br />
*	  Instanciation : <br />
*	  <b>$tp_tags= new Core_Model_tp_tags();</b>
*  @version 0.01
*  @since 2012-12-14
*  @author florent.bonenfant@neuf.fr
*/

class Core_Model_Tags
{

    /**
    *  @var string
    *  @desc Variable de type : int
    *        Longueur : 10 unsigned
    */

    private $tagsId;

    /**
    *  @var string
    *  @desc Variable de type : varchar
    *        Longueur : 50
    */

    private $tagsLabel;
    /**
    *  @return $tagsId
    */

    public function getTagsId()
    {
        return $this->tagsId;
    }

    /**
    *  @param string $tagsId
    *  @desc définit la variable : tagsId de type <b>string</b>
    */

    public function setTagsId($tagsId)
    {
        $this->tagsId = $tagsId;

        return $this;
    }

    /**
    *  @return $tagsLabel
    */

    public function getTagsLabel()
    {
        return $this->tagsLabel;
    }

    /**
    *  @param string $tagsLabel
    *  @desc définit la variable : tagsLabel de type <b>string</b>
    */

    public function setTagsLabel($tagsLabel)
    {
        $this->tagsLabel = $tagsLabel;

        return $this;
    }

}

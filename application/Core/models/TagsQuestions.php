<?php

/**
*  Objet de domaine : tp_tags_questions
*  Représente une entité de domaine : tp_tags_questions
*/

/**
*  Objet de domaine : tp_tags_questions
*  Représente une entité de domaine : tp_tags_questions
*
*  @package Core
*  @subpackage Model
*  @example <br />
*	  Instanciation : <br />
*	  <b>$tp_tags_questions= new Core_Model_tp_tags_questions();</b>
*  @version 0.01
*  @since 2012-12-14
*  @author florent.bonenfant@neuf.fr
*/

class Core_Model_TagsQuestions
{

    /**
    *  @var string
    *  @desc Variable de type : int
    *        Longueur : 10 unsigned
    */

    private $tqTagsId;

    /**
    *  @var string
    *  @desc Variable de type : int
    *        Longueur : 10 unsigned
    */

    private $tqQuestId;
    /**
    *  @return $tqTagsId
    */

    public function getTqTagsId()
    {
        return $this->tqTagsId;
    }

    /**
    *  @param string $tqTagsId
    *  @desc définit la variable : tqTagsId de type <b>string</b>
    */

    public function setTqTagsId($tqTagsId)
    {
        $this->tqTagsId = $tqTagsId;

        return $this;
    }

    /**
    *  @return $tqQuestId
    */

    public function getTqQuestId()
    {
        return $this->tqQuestId;
    }

    /**
    *  @param string $tqQuestId
    *  @desc définit la variable : tqQuestId de type <b>string</b>
    */

    public function setTqQuestId($tqQuestId)
    {
        $this->tqQuestId = $tqQuestId;

        return $this;
    }

}

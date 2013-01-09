<?php

/**
*  Objet de domaine : tp_liste_questions
*  Représente une entité de domaine : tp_liste_questions
*/

/**
*  Objet de domaine : tp_liste_questions
*  Représente une entité de domaine : tp_liste_questions
*
*  @package Core
*  @subpackage Model
*  @example <br />
*	  Instanciation : <br />
*	  <b>$tp_liste_questions= new Core_Model_tp_liste_questions();</b>
*  @version 0.01
*  @since 2012-12-14
*  @author florent.bonenfant@neuf.fr
*/

class Core_Model_ListeQuestions
{

    /**
    *  @var string
    *  @desc Variable de type : int
    *        Longueur : 10 unsigned
    */

    private $lstQuesId;

    /**
    *  @var string
    *  @desc Variable de type : int
    *        Longueur : 10 unsigned
    */

    private $lstQuesIdQues;

    /**
    *  @var string
    *  @desc Variable de type : int
    *        Longueur : 10 unsigned
    */

    private $lstQuesIdQuestionnaire;
    /**
    *  @return $lstQuesId
    */

    public function getLstQuesId()
    {
        return $this->lstQuesId;
    }

    /**
    *  @param string $lstQuesId
    *  @desc définit la variable : lstQuesId de type <b>string</b>
    */

    public function setLstQuesId($lstQuesId)
    {
        $this->lstQuesId = $lstQuesId;

        return $this;
    }

    /**
    *  @return $lstQuesIdQues
    */

    public function getLstQuesIdQues()
    {
        return $this->lstQuesIdQues;
    }

    /**
    *  @param string $lstQuesIdQues
    *  @desc définit la variable : lstQuesIdQues de type <b>string</b>
    */

    public function setLstQuesIdQues($lstQuesIdQues)
    {
        $this->lstQuesIdQues = $lstQuesIdQues;

        return $this;
    }

    /**
    *  @return $lstQuesIdQuestionnaire
    */

    public function getLstQuesIdQuestionnaire()
    {
        return $this->lstQuesIdQuestionnaire;
    }

    /**
    *  @param string $lstQuesIdQuestionnaire
    *  @desc définit la variable : lstQuesIdQuestionnaire de type <b>string</b>
    */

    public function setLstQuesIdQuestionnaire($lstQuesIdQuestionnaire)
    {
        $this->lstQuesIdQuestionnaire = $lstQuesIdQuestionnaire;

        return $this;
    }

}

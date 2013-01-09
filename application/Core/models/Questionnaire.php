<?php

/**
*  Objet de domaine : questionnaire
*  Représente une entité de domaine : questionnaire
*/

/**
*  Objet de domaine : tp_questionnaire
*  Représente une entité de domaine : questionnaire
*
*  @package Core
*  @subpackage Model
*  @example <br />
*	  Instanciation : <br />
*	  <b>$tp_questionnaire= new Core_Model_questionnaire();</b>
*  @version 0.01
*  @since 2012-12-14
*  @author florent.bonenfant@neuf.fr
*/

class Core_Model_Questionnaire
{

    /**
    *  @var string
    *  @desc Variable de type : int
    *        Longueur : 10 unsigned
    */

    private $questionnaireId;

    /**
    *  @var string
    *  @desc Variable de type : tinyint
    *        Longueur : 3 unsigned
    */

    private $questionnaireNb;

    /**
    *  @var string
    *  @desc Variable de type : tinyint
    *        Longueur : 3 unsigned
    */

    private $questionnaireTemps;

    /**
    *  @var string
    *  @desc Variable de type : varchar
    *        Longueur : 100
    */

    private $questionnaireIntitule;

    /**
    *  @var string
    *  @desc Variable de type : int
    *        Longueur : 10 unsigned
    */

    private $questionnaireIdUser;
    /**
    *  @return $questionnaireId
    */

    public function getQuestionnaireId()
    {
        return $this->questionnaireId;
    }

    /**
    *  @param string $questionnaireId
    *  @desc définit la variable : questionnaireId de type <b>string</b>
    */

    public function setQuestionnaireId($questionnaireId)
    {
        $this->questionnaireId = $questionnaireId;

        return $this;
    }

    /**
    *  @return $questionnaireNb
    */

    public function getQuestionnaireNb()
    {
        return $this->questionnaireNb;
    }

    /**
    *  @param string $questionnaireNb
    *  @desc définit la variable : questionnaireNb de type <b>string</b>
    */

    public function setQuestionnaireNb($questionnaireNb)
    {
        $this->questionnaireNb = $questionnaireNb;

        return $this;
    }

    /**
    *  @return $questionnaireTemps
    */

    public function getQuestionnaireTemps()
    {
        return $this->questionnaireTemps;
    }

    /**
    *  @param string $questionnaireTemps
    *  @desc définit la variable : questionnaireTemps de type <b>string</b>
    */

    public function setQuestionnaireTemps($questionnaireTemps)
    {
        $this->questionnaireTemps = $questionnaireTemps;

        return $this;
    }

    /**
    *  @return $questionnaireIntitule
    */

    public function getQuestionnaireIntitule()
    {
        return $this->questionnaireIntitule;
    }

    /**
    *  @param string $questionnaireIntitule
    *  @desc définit la variable : questionnaireIntitule de type <b>string</b>
    */

    public function setQuestionnaireIntitule($questionnaireIntitule)
    {
        $this->questionnaireIntitule = $questionnaireIntitule;

        return $this;
    }

    /**
    *  @return $questionnaireIdUser
    */

    public function getQuestionnaireIdUser()
    {
        return $this->questionnaireIdUser;
    }

    /**
    *  @param string $questionnaireIdUser
    *  @desc définit la variable : questionnaireIdUser de type <b>string</b>
    */

    public function setQuestionnaireIdUser($questionnaireIdUser)
    {
        $this->questionnaireIdUser = $questionnaireIdUser;

        return $this;
    }

}

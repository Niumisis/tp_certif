<?php

/**
*  Objet de domaine : questions
*  Représente une entité de domaine : questions
*/

/**
*  Objet de domaine : questions
*  Représente une entité de domaine : questions
*
*  @package Core
*  @subpackage Model
*  @example <br />
*	  Instanciation : <br />
*	  <b>$tp_questions= new Core_Model_questions();</b>
*  @version 0.01
*  @since 2012-12-14
*  @author florent.bonenfant@neuf.fr
*/

class Core_Model_Questions
{

    /**
    *  @var string
    *  @desc Variable de type : int
    *        Longueur : 10 unsigned
    */

    private $idQuestions;

    /**
    *  @var string
    *  @desc Variable de type : tinyint
    *        Longueur : 3 unsigned
    */

    private $typeQuestions;

    /**
    *  @var date
    *  @desc Variable de type : timestamp
    */

    private $dateQuestions;

    /**
    *  @var string
    *  @desc Variable de type : text
    *        Longueur : 65535
    */

    private $intituleQuestions;

    /**
    *  @var string
    *  @desc Variable de type : varchar
    *        Longueur : 250
    */

    private $propositionQuestions1;

    /**
    *  @var string
    *  @desc Variable de type : varchar
    *        Longueur : 250
    */

    private $propositionQuestions2;

    /**
    *  @var string
    *  @desc Variable de type : varchar
    *        Longueur : 250
    */

    private $propositionQuestions3;

    /**
    *  @var string
    *  @desc Variable de type : varchar
    *        Longueur : 250
    */

    private $propositionQuestions4;

    /**
    *  @var string
    *  @desc Variable de type : varchar
    *        Longueur : 100
    */

    private $reponsesQuestions;

    /**
    *  @var string
    *  @desc Variable de type : varchar
    *        Longueur : 250
    */

    private $imageUrlQuestions;
    /**
    *  @return $idQuestions
    */

    public function getIdQuestions()
    {
        return $this->idQuestions;
    }

    /**
    *  @param string $idQuestions
    *  @desc définit la variable : idQuestions de type <b>string</b>
    */

    public function setIdQuestions($idQuestions)
    {
        $this->idQuestions = $idQuestions;

        return $this;
    }

    /**
    *  @return $typeQuestions
    */

    public function getTypeQuestions()
    {
        return $this->typeQuestions;
    }

    /**
    *  @param string $typeQuestions
    *  @desc définit la variable : typeQuestions de type <b>string</b>
    */

    public function setTypeQuestions($typeQuestions)
    {
        $this->typeQuestions = $typeQuestions;

        return $this;
    }

    /**
    *  @return $dateQuestions
    */

    public function getDateQuestions()
    {
        return $this->dateQuestions;
    }

    /**
    *  @param date $dateQuestions
    *  @desc définit la variable : dateQuestions de type <b>date</b>
    */

    public function setDateQuestions($dateQuestions)
    {
        $this->dateQuestions = $dateQuestions;

        return $this;
    }

    /**
    *  @return $intituleQuestions
    */

    public function getIntituleQuestions()
    {
        return $this->intituleQuestions;
    }

    /**
    *  @param string $intituleQuestions
    *  @desc définit la variable : intituleQuestions de type <b>string</b>
    */

    public function setIntituleQuestions($intituleQuestions)
    {
        $this->intituleQuestions = $intituleQuestions;

        return $this;
    }

    /**
    *  @return $propositionQuestions1
    */

    public function getPropositionQuestions1()
    {
        return $this->propositionQuestions1;
    }

    /**
    *  @param string $propositionQuestions1
    *  @desc définit la variable : propositionQuestions1 de type <b>string</b>
    */

    public function setPropositionQuestions1($propositionQuestions1)
    {
        $this->propositionQuestions1 = $propositionQuestions1;

        return $this;
    }

    /**
    *  @return $propositionQuestions2
    */

    public function getPropositionQuestions2()
    {
        return $this->propositionQuestions2;
    }

    /**
    *  @param string $propositionQuestions2
    *  @desc définit la variable : propositionQuestions2 de type <b>string</b>
    */

    public function setPropositionQuestions2($propositionQuestions2)
    {
        $this->propositionQuestions2 = $propositionQuestions2;

        return $this;
    }

    /**
    *  @return $propositionQuestions3
    */

    public function getPropositionQuestions3()
    {
        return $this->propositionQuestions3;
    }

    /**
    *  @param string $propositionQuestions3
    *  @desc définit la variable : propositionQuestions3 de type <b>string</b>
    */

    public function setPropositionQuestions3($propositionQuestions3)
    {
        $this->propositionQuestions3 = $propositionQuestions3;

        return $this;
    }

    /**
    *  @return $propositionQuestions4
    */

    public function getPropositionQuestions4()
    {
        return $this->propositionQuestions4;
    }

    /**
    *  @param string $propositionQuestions4
    *  @desc définit la variable : propositionQuestions4 de type <b>string</b>
    */

    public function setPropositionQuestions4($propositionQuestions4)
    {
        $this->propositionQuestions4 = $propositionQuestions4;

        return $this;
    }

    /**
    *  @return $reponsesQuestions
    */

    public function getReponsesQuestions()
    {
        return $this->reponsesQuestions;
    }

    /**
    *  @param string $reponsesQuestions
    *  @desc définit la variable : reponsesQuestions de type <b>string</b>
    */

    public function setReponsesQuestions($reponsesQuestions)
    {
        $this->reponsesQuestions = $reponsesQuestions;

        return $this;
    }

    /**
    *  @return $imageUrlQuestions
    */

    public function getImageUrlQuestions()
    {
        return $this->imageUrlQuestions;
    }

    /**
    *  @param string $imageUrlQuestions
    *  @desc définit la variable : imageUrlQuestions de type <b>string</b>
    */

    public function setImageUrlQuestions($imageUrlQuestions)
    {
        $this->imageUrlQuestions = $imageUrlQuestions;

        return $this;
    }

}

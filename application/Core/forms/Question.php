<?php
/**
 * Formulaire d'ajout d'un utilisateur
 *
 * Défini le contenu et le comportement du
 * formulaire d'ajout d'un utilisateur avec Zend_Form
 *
 */

/**
 * Formulaire d'ajout d'un utilisateur
 *
 * Défini le contenu et le comportement du
 * formulaire d'ajout d'un utilisateur avec Zend_Form
 *
 *
 * @category MyApp
 * @package Core
 * @subpackage Form
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 * @uses Zend_Form
 */
class Core_Form_Question extends Zend_Form
{
	private $_questionId = null;
	
	public function __construct($id) {
		$this->_questionId = $id;
		parent::__construct();
	}
	
    public function init()
    {

    	$csq = new Core_Service_Quizz();
    	$option = array();

   		$option[] = $csq->details_question($this->_questionId)->getPropositionQuestions1();
    	
    	if ($csq->details_question($this->_questionId)->getPropositionQuestions2() != '') {
    		$option[] = $csq->details_question($this->_questionId)->getPropositionQuestions2();
    	}
    	 
    	if ($csq->details_question($this->_questionId)->getPropositionQuestions3() != '') {
    		$option[] = $csq->details_question($this->_questionId)->getPropositionQuestions3();
    	}
    	 
    	if ($csq->details_question($this->_questionId)->getPropositionQuestions4() != '') {
    		$option[] = $csq->details_question($this->_questionId)->getPropositionQuestions4();
    	}
    	
    	// on fait le trie
    	switch ($csq->details_question($this->_questionId)->getTypeQuestions()) {
    		case 0:
    			// radio
    			$list = new Zend_Form_Element_Radio('reponse');

		        $list->addMultiOptions($option);
		    	$this->addElement($list);
    			break;
    		case 1:
    			// checkbox
    			$list = new Zend_Form_Element_MultiCheckbox('reponse');

    			$list->addMultiOptions($option);
    			$this->addElement($list);
    			
    			break;
    		case 2:
    			// reponse libre
    			$reponse = new Zend_Form_Element_Text('reponse');
    			$this->addElement($reponse);
    			break;
    	}
    	
		$this->addDisplayGroup(array('reponse'), 'reponseQuizz');
    	
    	$id = new Zend_Form_Element_Hidden('question');
    	$this->addElement($id);
    	

    	$prev = new Zend_Form_Element_Submit('precedent');
        $this->addElement($prev);
        
 		$tag = new Zend_Form_Element_Submit('marquer');
        $this->addElement($tag);
        
        $next = new Zend_Form_Element_Submit('suivant');
        $this->addElement($next);
        $this->addDisplayGroup(
        		array(
        				'precedent',
        				'marquer',
        				'suivant'
        				)
        		, 'boutonsQuizz');

        $this->setDisplayGroupDecorators( array(
        		'FormElements',
        		'Fieldset'
        ));
    }
}

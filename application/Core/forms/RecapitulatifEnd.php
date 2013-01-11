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
class Core_Form_RecapitulatifEnd extends Zend_Form
{
    public function init()
    {
    	$csq = new Core_Service_Quizz();
    	$flagElement = array();
    	$voidElement = array();

    	if (0 < $csq->find_flag()) {
	    	foreach($csq->find_flag() as $id) {
		    	$flagElement[$id] = $id;
	    	}
    	}

    	$questionsFlags = new Zend_Form_Element_Radio('questionsFlags');
    	$questionsFlags->addMultiOptions($flagElement);
    	$this->addElement($questionsFlags);

    	if (count($csq->find_void($csq->getSessionReponse()->questionnaireId)) < $csq->getNbQuestion()) {
	    	foreach($csq->find_void($csq->getSessionReponse()->questionnaireId) as $id) {
		    	$voidElement[$id] = $id;
	    	}
    	}
    	
    	$questionsVoid = new Zend_Form_Element_Radio('questionsVoid');
    	$questionsVoid->addMultiOptions($voidElement);
    	$this->addElement($questionsVoid);


        $correction = new Zend_Form_Element_Submit('correction');
        $correction->setAttrib('class', 'btn')
        	  ->setName('correction')
	          ->setLabel('core_quizz_form_label_fin_correction');
        $this->addElement($correction);
        
        $valider = new Zend_Form_Element_Submit('valider');
        $valider->setAttrib('class', 'btn')
		      ->setName('valider')
		      ->setLabel('core_quizz_form_label_fin_validation');
        $this->addElement($valider);
        
        $this->setDecorators(array(
    			array('ViewScript', array('viewScript' => 'quizz/formRecapEnd.phtml'))
    	));
    }
}

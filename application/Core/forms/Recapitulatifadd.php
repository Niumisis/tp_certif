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
class Core_Form_Recapitulatifadd extends Zend_Form
{
    public function init()
    {
    	$csq = new Core_Service_Quizz();
    	$options = array();
    	
    	$csq->liste_questionnaire();
    	
    	foreach($csq->liste_questionnaire() as $question) {
    		$options[$question->getQuestionnaireId()]['intitule'] = $question->getQuestionnaireIntitule();
	    	$options[$question->getQuestionnaireId()]['nombre'] = $question->getQuestionnaireNb();
	    	$options[$question->getQuestionnaireId()]['temps'] = $question->getQuestionnaireTemps();
    	}
    	

 
    	$questionnaire = new Zend_Form_Element_Radio('questionnaire');
    	$questionnaire->addMultiOptions($options);
    	$this->addElement($questionnaire);
    	
    	$this->setDecorators(array(
    			array('ViewScript', array('viewScript' => 'quizz/formrecap.phtml'))
    	));
    	
        $start = new Zend_Form_Element_Submit('debut');
        $start->setAttrib('class', 'btn')
	          ->setLabel('core_quizz_form_label_debut');
        $this->addElement($start);
    }
}

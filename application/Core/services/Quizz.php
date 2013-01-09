<?php

/**
 * Couche service pour les traitements li√©s
 * √† la gestion des questions
 *
 * Couche service  pour les traitements li√©s
 * √† la gestion des questions : <br />
 *
 */

/**
 * Couche service pour les traitements li√©s
 * √† la gestion des questions
 *
 * Couche service  pour les traitements li√©s
 * √† la gestion des questions : <br />
 *
 * @category MyApp
 * @package Core
 * @subpackage Service
 * @example <br />
 *          Instanciation : <br />
 *          <b>$quizzService = new Core_Service_Quizz();</b>
 * @version 0.01
 * @since 2013-01-07
 * @author Moi <moi@monmail.com>
 */
class Core_Service_Quizz extends My_Service_ServiceAbstract
{
	
    private $_SessionReponse;
    
	// on liste les reponses flaggÈ
    public function find_flag() {
    	unset($listeFlag);
    	$listeFlag = array();
    	foreach($this->getSessionReponse()->questions as $clequestion => $reponse ) {
    		if ($reponse['flag'] == 1)
    			$listeFlag[] = $clequestion;
    		
    		$tabQuestionsRempli[] = $clequestion;
    	}

    	return $listeFlag;
    }
    
    // on liste les questions du questionnaire
    public function find_questions($idQuestionnaire) {
    	$tabQuestions = array();
    	$listeQuestions = new Core_Model_Mapper_ListeQuestions();
    	$questions = $listeQuestions->fetchall(array('lst_ques_id_questionnaire=?' => $idQuestionnaire));
    	while($questions->valid() == true) {
    		$tabQuestions[] = $questions->current()->getLstQuesIdQues();
    		$questions->next();
    	}
    	return $tabQuestions;
    }
    
    // recuperation des infos question
    public function details_question($id) {
    	if (isset($this->getSessionReponse()->questionnaireId)) {
    	
    		$listeQuestion = new Core_Model_Mapper_ListeQuestions();
    		$nbQuestion = $listeQuestion->count(
							    				array(
							    						'lst_ques_id_questionnaire=?' => $this->getSessionReponse()->questionnaireId,
							    						'lst_ques_id_ques=?' => $id,
							    				)
							    		);
    		if ($nbQuestion > 0) {
    			$question = new Core_Model_Mapper_Questions();
    			return $question->find($id);
    		} else {
    			return false;
    		}
    	} else {
    		return false;
    	}
    }
    
    // recherche les questions non repondu
    public function find_void($idQuestionnaire) {
    	
    	$tabQuestions = $this->find_questions($idQuestionnaire);
    	
    	if (count($this->getSessionReponse()->questions) > 0) {
	    	// on filtre les reponses non rÈpondu
	    	$tabQuestionsRempli = array();
	    	foreach($this->getSessionReponse()->questions as $clequestion => $reponse ) {
	    		$tabQuestionsRempli[] = $clequestion;
	    	}
	    	 
	    	return array_diff($tabQuestions, $tabQuestionsRempli);
    	} else {
    		return $tabQuestions;
    	}
    }
    	
    // questionnaire aleatoire
    public function rand_form() {
    	// choix du formulaire automatique
    	
    //	if (count($searchResult) == 0) {
    		$questionnaires = new Core_Model_Mapper_Questionnaire();
    		$idsQuestionnaire = $questionnaires->fetchAll();
    		foreach($idsQuestionnaire as $id)
    			$searchResult[] = $id->getQuestionnaireID();
    //	}
    	
    	/*
    	//--- trie du tableau par nombre d'appel aux tags
    	$array = array(1, 3,"hello", 1, "world", "hello");
    	$array = array_count_values($array);
    	arsort($array);
    	//print_r($array);
    	//---*/
    	
    	return array_rand($searchResult, 1);
    }
    	
	// enregistre les infos du questionnaire en session
	public function save_form($id_formulaire) {
		$user = new Core_Service_User();
		$questionnaire = new Core_Model_Mapper_Questionnaire();
		$infosQuestionnaire = $questionnaire->find($id_formulaire);
		
		$reponses = new Zend_Session_Namespace('Reponses');
		$this->getSessionReponse()->userId = $user->getIdentity()->getUserId();
		$this->getSessionReponse()->nb = $infosQuestionnaire->getQuestionnaireNb();
		$this->getSessionReponse()->temps = $infosQuestionnaire->getQuestionnaireTemps();
		$this->getSessionReponse()->questionnaireId = $infosQuestionnaire->getQuestionnaireId();
		$this->getSessionReponse()->start = time();
	}   
    	
	// retourne le nombre de question du formulaire
	public function getNbQuestion() {
		if (isset($this->getSessionReponse()->nb))
			return $this->getSessionReponse()->nb;
		else 
			return false;
	}
    	
	// retourne le nombre de question repondu du formulaire
	public function getNbQuestionRepondu() {
		if (isset($this->getSessionReponse()->nb))
			return count($this->getSessionReponse()->questions);
		else
			return false;
	}
	
	// enregistre les reponses
   // public function save($idReponse, $flag, $reponse) {
    public function save($tab) {
    	$idReponse = $tab['question'];
    	$reponse = '';
    	if (!isset($tab['reponse'])) $tab['reponse'] = null;
    	
    	if (is_array($tab['reponse'])) {
    		foreach($tab['reponse'] as $rep) {
    			$reponse .= $rep . '®';
    		}
    	} else {
    		$reponse .= $tab['reponse'];
    	}
    	$reponse = trim($reponse, '®');
    	
    	// temp
    	if (!isset($reponses->userId)) {
    		$this->save_form(1);
    	}
    	
    	if (isset($this->getSessionReponse()->questions[$idReponse])) {
			unset($this->getSessionReponse()->questions[$idReponse]);
    	}
    	
    	$this->getSessionReponse()->questions[$idReponse]['id'] = (int) $idReponse;
    	$this->getSessionReponse()->questions[$idReponse]['flag'] = (int) isset($tab['marquer']);
    	$this->getSessionReponse()->questions[$idReponse]['resultat'] = $reponse;
    	$this->getSessionReponse()->questions[$idReponse]['date'] = time();
    	

    	if (isset($tab['precedent'])) {
    		return $this->prev((int) $idReponse);
    	} else {
    		return $this->next((int) $idReponse);
    	}
    }

    // question suivante
    public function next($lastid) {
    	if (isset($this->getSessionReponse()->questionnaireId)) {
    		$questions = $this->find_questions($this->getSessionReponse()->questionnaireId);
    		if (count($questions) > 1) {
  
    			for ($i=0; $i <= count($questions); $i++) {
    				if (current($questions) == $lastid) {
    					current($questions);
    					break;
    				}
    				next($questions);
    			}
     			return next($questions);
    		} else {
    			return end($questions);
    		}
    	} else {
    		return false;
    	}
    }
//     public function next() {
//     	if (isset($this->getSessionReponse()->questionnaireId)) {
// 	    	$questions = $this->find_questions($this->getSessionReponse()->questionnaireId);

// 	    	$dernierEnregistrement = end($this->getSessionReponse()->questions);
	    	
// 	    	// on renvoi l'enregistrement apres le dernier enregistrÈ
// 	    	if ((in_array($dernierEnregistrement['id'], $questions)) && (end($questions) != $dernierEnregistrement['id'])) {
// 		    	foreach($questions as $id) {
// 		    		if ($id == $dernierEnregistrement['id']) {
// 		    			return current($questions);
// 		    		}
// 		    	}
// 	    	} else {
// 	    		return end($questions);
// 	    	}
//     	} else {
//     		return false;
//     	}
//     }
    
    // question precedente
//     public function prev() {
//     	if (isset($this->getSessionReponse()->questionnaireId)) {
//     		if (reset($this->getSessionReponse()->questions) != end($this->getSessionReponse()->questions)) {
// 		    	$dernierEnregistrement = ($this->getSessionReponse()->questions);
// 		    	end($dernierEnregistrement);
// 		    	prev($dernierEnregistrement);
// 		    	$dernierEnregistrement = current($dernierEnregistrement);
// 		    	return ($dernierEnregistrement['id']);
//     		} else {
//     			$first = reset($this->getSessionReponse()->questions);
//     			echo $first['id'];
//     		}
//     	} else {
//     		return false;
//     	}
//     }

    public function prev($lastid) {
    	if (isset($this->getSessionReponse()->questionnaireId)) {
    		$questions = $this->find_questions($this->getSessionReponse()->questionnaireId);
    		if (count($questions) > 1) {
  				$debutPos = reset($questions);
    			for ($i=0; $i <= count($questions); $i++) {
    				if (current($questions) == $lastid) {
    					current($questions);
    					break;
    				}
    				next($questions);
    			}

    			if ($debutPos != current($questions)) 
    				return prev($questions);
    			else
     				return end($questions);
    		} else {
    			return reset($questions);
    		}
    	} else {
    		return false;
    	}
    }
    
    // suppression de la session
    public function unsetSession() {
    	Zend_Session::namespaceUnset('Reponses');
    }
    
    public function getSessionReponse()
    {
    	if (null === $this->_SessionReponse) {
    		$this->_SessionReponse = new Zend_Session_Namespace('Reponses');
    	}
    	return $this->_SessionReponse;
    }
}
 
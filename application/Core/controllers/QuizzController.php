<?php 
/**
 * Controller des utilisateurs
 *
 * Ce controller gère les actions en rapport avec
 * la gestion des utilisateurs
 * <ul>
 * <li>Listage des utilisateurs : listAction()</li>
 * <li>Création d'un utilisateurs : newAction()</li>
 * <li>Suppression d'un utilisateurs : deleteAction()</li>
 * <li>Modification d'un utilisateurs : editAction()</li>
 * </ul>
 *
 */

/**
 * Controller des utilisateurs
 *
 * Ce controller gère les actions en rapport avec
 * la gestion des utilisateurs
 * <ul>
 * <li>Listage des utilisateurs : listAction()</li>
 * <li>Création d'un utilisateurs : newAction()</li>
 * <li>Suppression d'un utilisateurs : deleteAction()</li>
 * <li>Modification d'un utilisateurs : editAction()</li>
 * </ul>
 *
 * @category MyApp
 * @package Core
 * @subpackage Controller
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 * @uses Core_Service_UserApi
 */
class QuizzController extends Zend_Controller_Action
{
    private $_timer = false;
    
    public function init()
    {
        $this->userService = new Core_Service_User();
        $this->_timer = false;
    }
    
    // affichage des qestions
	public function questionAction() {
		$this->view->timer = $this->_timer = true;
		$idquestionnaire = 1;
		// on recupere l'id de la question
		$qid = (int) $this->getRequest()->getParam('qid');
		$csq = new Core_Service_Quizz();
		$this->view->nbReponse = $csq->getNbQuestionRepondu();
		$this->view->nbQuestion = $csq->getNbQuestion();
		if ($qid > 0) {
			if ($csq->details_question($qid) !== false) {
				$this->view->question = ($csq->details_question($qid));
				
				$form = new Core_Form_Question($qid);
		
				$form->setAction(null)
					 ->setMethod('post');
				
				$this->view->form = $form;
			} else {
				$this->view->errorMsg = 'question_not_found';
				$this->view->error = true;
			}
		} else {
			$questionId = $csq->find_questions($idquestionnaire);
			$form = new Core_Form_Question(reset($questionId));
				
			$form->setAction(null)
				 ->setMethod('post');
				
			$this->view->form = $form;
			$this->view->question = ($csq->details_question(reset($questionId)));
		}
		
		if( $this->getRequest()->isPost()) {
			if ($form->isValid($this->getRequest()->getPost())) {
				//$this->_redirect($this->view->url(array(), 'CoreQuizzQuestion' ));
				$this->_redirect('/quizz/question/'.$csq->save($this->getRequest()->getPost()));
			}
		}
		
	}
	
    // liste des quizz dispo
    public function recapitulatifAction()
    {
    	$id_form = 1;
    	/*$ss = new Core_Service_Quizz();
    	$ss->save_form($id_form);
    	$ss->save(2,1,'tdj  eponse');
    	$ss->save(4,1,'qsdf sqdf');
    	// recuperation des id de tags via le formulaire (tableau)
    	//$ss->find_flag();
    	//print_r($ss->find_void(1));
    	$ss->rand_form(
    		//	array(3,2)
    			);
    	
    	//var_dump($ss->prev());
    	$ss->details_question(1);
    	*/
    	$user = new Core_Model_User();
		$csq = new Core_Service_Quizz();
    	$this->view->mdp = $this->userService->getIdentity()->getUserPwd();
    	$this->view->login = $this->userService->getIdentity()->getUserLogin();
    	
    	$form = new Core_Form_Recapitulatifadd();
    	$form->setAction(null)
    		 ->setMethod('post');

    	if( $this->getRequest()->isPost()) {
    		print_r($form->getValues);
    		print_r($this->getRequest()->getPost());
    		if ($form->isValid($this->getRequest()->getPost())) {
    			//print_r($form);
    			//$csq->save_form($id_form);
    			//print_r($this->getRequest()->getPost());
    			//$this->_redirect($this->view->url(array(), 'CoreQuizzQuestion'));
    		}
    	}
    	
    	// supression de la session 
    	
    	$csq->unsetSession();
    	//print_r($csq->rand_form());
    	//print_r($csq->details_questionnaire(2));
    	//$csq->liste_questionnaire();
    	$this->view->listeQuestionnaire = $csq->liste_questionnaire();
    	$this->view->form = $form;
    }
    
    public function creationAction()
    {
    	
    	$form = new Core_Form_Useradd();
    	$form->setAction(null)
    		 ->setMethod('post');
    	
    	if( $this->getRequest()->isPost()) {
    		 
    		if ($form->isValid($this->getRequest()->getPost())) {
    			 
    			$user = new Core_Model_User();
    			$user->setUserLogin($form->getValue('login'))
    				 ->setUserPwd($this->userService->generateurPwd());
    			
    			
    			try {
    				$userCreated = $this->userService->save($user);
    			} catch(Exception $e) {
    				$userCreated = false;
    				$this->view->error = true;
    			}
    			
    	
    			if(!$userCreated) {
    				$this->view->error = true;
    			} else {
    				// Si valide, on traite l'identification
    				$userApi = new Core_Service_User();
    				if ($userApi->authenticate($user->getUserLogin(), $user->getUserPwd())) {
    					$this->_redirect($this->view->url(array(), 'CoreQuizzRecapitulatif')); 
    				} else {
    					$this->view->errorMsg = 'Erreur lors de la création de votre login, merci d\'en essayer un autre';
    				}
    				
    			}
    	
    		}
    	}
    	
    	$this->view->form = $form;
    }
    
      
    
    
    public function deleteAction()
    {
    /*
        $uid = (int) $this->getRequest()->getParam('uid');
        $this->userService->delete($uid);
        $this->_redirect($this->view->url(array(), 'coreUserList'));*/
    }
}

<?php
/**
 * MODULE CORE // CONTROLLER WIDGETS
 *
 * Ce fichier contient une unique classe : WidgetsController
 * 
 */

/**
 * Définition des widgets du module CORE
 * 
 * Cette classe défini les widgets utilisables sur le dashboard et la sidebar
 * 
 * @category   Application
 * @package    Application_Core
 * @subpackage Controller
 * @desc       Classe de type controller dédié à la définitino des widgets du module Core
 * @version    0.1
 * @since      2012-09-10
 */
class WidgetsController extends Zend_Controller_Action
{
    /**
     * <b>Méthode appelée automatiquement par le FrontController avant chaque action</b><br />
     * Désactive le rendu du layout pour l'ensemble des actions et s'assure
     * que la requête provient bien d'un composant XHR. Dans le cas contraire, redirige
     * avec un code HTTP 303 vers la homepage.
     *
     * @return void
     */
    public function preDispatch()
    {
        if (!$this->getRequest()->isXmlHttpRequest() and 'development' !== APPLICATION_ENV) {
            $this->_redirect(
                $this->view->url(array(), 'coreIndexIndex'),
                array('exit' => true, 'code' => 303)
            );
        }
    }
    
    /**
     * Méthode support pour l'affichage du widget "Post-it!"
     * Ce widget est plutôt conçu pour être affiché dans la sidebar
     */
    public function postitAction()
    {
        $postitSvc = new Core_Service_Widgets_PostIt();
        $userSvc = new Core_Service_User();
        
        if ($this->getRequest()->isPost()) {
            $result = new stdClass();
            $result->status = 0;
            $result->message = null;
            
            $action = $this->getRequest()->getParam('do');
            
            switch ($action) {
                /*
                 * Permet l'enregistrement d'un post-it
                 */
                case 'save' :
                    try {
                        $postit = new Core_Model_WidgetPostit();
                        $postit->setContent($this->getRequest()->getParam('content'))
                               ->setTimestamp(date('Y-m-d H:i:s'))
                               ->setUser($userSvc->getIdentity());
                        $postitSvc->save($postit);
                        $result->status = 1;
                        $result->message = $this->view->translate('core_widget_postit_saved', date('H:i:s'));
                    } catch (Exception $e) {
                        $result->status = 0;
                        $result->message = $this->view->translate('core_widget_postit_not_saved');
                        if ('development' === APPLICATION_ENV) {
                            $result->message .= "\n\nDEBUG : " . $this->view->translate($e->getMessage());
                        }
                    }
                    break;
                    /*
                     * Permet la suppression d'un post-it
                    */
                case 'delete' :
                    $id = (int) $this->getRequest()->getParam('postit');
                    try {
                        $postitSvc->delete($id);
                        $result->status = 1;
                        $result->message = null;
                    } catch (Exception $e) {
                        $result->status = 0;
                        $result->message = $this->view->translate('core_widget_postit_not_deleted');
                        if ('development' === APPLICATION_ENV) {
                            $result->message .= "\n\nDEBUG : " . $this->view->translate($e->getMessage());
                        }
                    }
                    break;
                /*
                 * Permet le comptage des post-its pour un utilisateur donné
                 */
                case 'count' :
                    try {
                        $result->status = 1;
                        $result->count  = $postitSvc->countForUser($userSvc->getIdentity()->getId());
                    } catch (Exception $e) {
                            $result->status = 0;
                            if ('development' === APPLICATION_ENV) {
                                $result->message = "\n\nDEBUG : " . $this->view->translate($e->getMessage());
                            }
                    }
                    break;
                /*
                 * Permet le listage des post-its pour un utilisateur donné
                 */
                case 'list' :
                    try {
                        $result->status = 1;
                        $postits = $postitSvc->fetchForUser($userSvc->getIdentity()->getId());
                        $result->content = array();
                        foreach($postits as $postit) {
                            $result->content[] =  $postit->toArray();
                        }
                    } catch (Exception $e) {
                        $result->status = 0;
                        if ('development' === APPLICATION_ENV) {
                            $result->message = "\n\nDEBUG : " . $this->view->translate($e->getMessage());
                        }
                    }
                    break;
                default: 
                    $result->status = 0;
                    $result->message = $this->view->translate('core_ajax_action_unknow');
            }
            $this->_helper->json($result);
        }
    }

}
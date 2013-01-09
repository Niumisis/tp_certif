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
class UserController extends Zend_Controller_Action
{
    private $userService;

    public function init()
    {
        $this->userService = new Core_Service_User();
    }

    public function listAction()
    {
        $this->view->users = $this->userService->fetchAll();
    }

    public function newAction()
    {
        $form = new Core_Form_Useradd();
        $form->setAction(null)
             ->setMethod('post');

        if ( $this->getRequest()->isPost()) {

            if ($form->isValid($this->getRequest()->getPost())) {

                $user = new Core_Model_User();
                $user->setLogin($form->getValue('login'))
                     ->setAdmin($form->getValue('admin'))
                     ->setPassword($form->getValue('password'));

                try {
                    $userCreated = $this->userService->save($user);

                } catch (Exception $e) {
                    $userCreated = false;
                    $this->view->error = true;

                }

                if (!$userCreated) {
                    $this->view->error = true;
                } else {
                    $this->_redirect($this->view->url(array(), 'coreUserList'));
                }

            }
        }

        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $uid = (int) $this->getRequest()->getParam('uid');
        $this->userService->delete($uid);
        $this->_redirect($this->view->url(array(), 'coreUserList'));
    }
}

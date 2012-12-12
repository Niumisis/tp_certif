<?php
/**
 * Controller des rôles utilisateurs
 *
 * Ce controller gère les actions en rapport avec
 * la gestion des rôles utilisateurs
 * <ul>
 * <li>Listage des rôles : listAction()</li>
 * <li>Création d'un rôle : newAction()</li>
 * <li>Suppression d'un rôle : deleteAction()</li>
 * <li>Modification d'un rôle : editAction()</li>
 * </ul>
 *
 */

/**
 * Controller des rôles utilisateurs
 *
 * Ce controller gère les actions en rapport avec
 * la gestion des rôles utilisateurs
 * <ul>
 * <li>Listage des rôles : listAction()</li>
 * <li>Création d'un rôle : newAction()</li>
 * <li>Suppression d'un rôle : deleteAction()</li>
 * <li>Modification d'un rôle : editAction()</li>
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
class RoleController extends Zend_Controller_Action
{
    private $_userService;

    public function init()
    {
//         $this->_userService = new Core_Service_User();
        $this->_roleService = new Core_Service_Role();
    }

    public function listAction()
    {
        $this->view->roles = $this->_roleService->fetchAll();
    }

    public function newAction()
    {
        $form = new Core_Form_Roleadd();
        $form->setAction(null)
             ->setMethod('post');

        if ( $this->getRequest()->isPost()) {
            if ($form->isValid($this->getRequest()->getPost())) {

                $role = new Core_Model_Role();
                $role->setLabel($form->getValue('label'));

                try {
                    $roleCreated = $this->_userService->saveRole($role);
                } catch (Exception $e) {
                    $roleCreated = false;
                    $this->view->error = true;

                    if (23000 == $e->getCode() && strstr($e->getMessage(), 'r_label')) {
                        $this->view->errorMessage = 'error_23000_login';
                    } else {
                        $this->view->errorMessage = 'error_unknown';
                    }
                }

                if (!$roleCreated) {
                    $this->view->error = true;
                } else {
                    $this->_redirect($this->view->url(array(), 'coreRoleList'));
                }

            }
        }

        $this->view->form = $form;
    }

    public function deleteAction()
    {
        $rid = (int) $this->getRequest()->getParam('rid');
        $this->_userService->deleteRole($rid);
        $this->_redirect($this->view->url(array(), 'coreRoleList'));
    }

    private function concatRights($resources)
    {
    	$rights = '';
    	
    	foreach($resources as $resource => $privilege) {
    		$rights .= $resource . ',' . $privilege . ',';
    	}
    	$rights = substr($rights, 0, strpos($rights, ',submit,submit,'));
    	
    	return $rights;
    }
    
    public function getActionList()
    {
    	// Emplacement des modules
    	$modulesPath = ROOT_PATH . '/application';
    	 
    	// On traverse le répertoire application à la recherche des modules
    	$modules = new DirectoryIterator($modulesPath);
    	foreach ($modules as $module) {
    		if ($module->isDir() && !$module->isDot()) {
    			$moduleName = $module->getFilename();
    			// On traverse le répertoire module à la recherche du répertoire controllers
    			$controllersPath = $modulesPath . '/' . $moduleName . '/controllers';
    			// On traverse le répertoire controllers afin de lister les controllers
    			$controllers = new DirectoryIterator($controllersPath);
    			$controllerList = array();
    			$actionList = array();
    			foreach ($controllers as $controller) {
    				$controllerFilename = $controller->getFilename();
    				if (strstr($controllerFilename, 'Controller.php')) {
    					// Récupération du nom de la resource
    					$resourceName = $moduleName . substr($controllerFilename, 0, strpos($controllerFilename, 'Controller.php'));
    					array_push($controllerList, $resourceName);
    					 
    					// Récupération du nom de la classe
    					$controllerName = substr($controllerFilename, 0, strpos($controllerFilename, '.php'));
    					require_once ($controllersPath.'/'.$controllerFilename);
    					 
    					// Réflexion sur le controller actuel
    					$class = new ReflectionClass($controllerName);
    					$actionList[$resourceName] = array();
    					foreach ($class->getMethods() as $method) {
    						if (strstr($method->name, 'Action')) {
    							array_push($actionList[$resourceName], substr($method->name, 0, strpos($method->name, 'Action')));
    						}
    					}
    				}
    			}
    		}
    	}
    	return $actionList;
    }
    
    public function editAction()
    {
    	$aclService = new Core_Service_Acl();
    	
    	$resources = $aclService->getAvailableResources();
    	$roleId = (int) $this->getRequest()->getParam('rid');
    	
    	$form = new Core_Form_Acl($resources, $roleId);

    	if ($this->getRequest()->isPost()) {
    		if ($form->isValid($this->getRequest()->getPost())) {
    			$privileges = $form->getValues();
    		
    			$roleId = array_shift($privileges);
    			$roleService = new Core_Service_Role();
    			$role = $roleService->find($roleId);
    			
    			
    			$aclService->savePrivileges($privileges, $role);
    			
    		} else {
    			// NON VALIDE
    			print 'invalide';exit;
    		}

    	}
    	

    	$this->view->form = $form;
    	  
    }
}

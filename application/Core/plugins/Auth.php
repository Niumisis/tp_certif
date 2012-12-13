<?php
/**
 * Plugin de FrontController ZF : AUTH
 *
 * Déclenche la vérification centralisée de
 * l'identification utilisateur au point
 * dispatchLoopStartup
 */

/**
 * Plugin de FrontController ZF : AUTH
 *
 * Déclenche la vérification centralisée de
 * l'identification utilisateur au point
 * dispatchLoopStartup
 *
 * @category MyApp
 * @package Core
 * @subpackage Plugin
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 * @uses Zend_Form
 */
class Core_Plugin_Auth extends Zend_Controller_Plugin_Abstract
{
    public function dispatchLoopStartup(Zend_Controller_Request_Abstract $request)
    {
        $auth = Zend_Auth::getInstance();
        if (!$auth->hasIdentity()) {
            $request->setModuleName('Core')
                    ->setControllerName('auth')
                    ->setActionName('signin')
                    ->setDispatched(true);
        }
    }
}

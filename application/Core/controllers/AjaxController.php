<?php
/**
 * Controller pour les requêtes AJAX
 *
 */

/**
 * Controller pour les requêtes AJAX
 *
 *
 * @category MyApp
 * @package Core
 * @subpackage Controller
 * @version 0.01
 * @since 2012-09-12
 * @author Moi <moi@monmail.com>
 */
class AjaxController extends Zend_Controller_Action
{

    public function preDispatch()
    {
        if (!$this->getRequest()->isXmlHttpRequest()) {
            throw new ErrorException('Bad context');
        }
    }

    public function indexAction()
    {
        $this->_helper->layout()->disableLayout();
    }

    public function jsonAction()
    {
         $result = new stdClass();
         $result->content = date('H:i:s');
         $result->status = 1;
         $this->_helper->json($result);

    }

}

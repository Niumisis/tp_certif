<?php
/**
 * Bootstrap du module Products
 *
 * Déclenche les initialisations de ressources
 * propres au module Products de l'application
 *
 */

/**
 * Bootstrap du module Products
 *
 * Déclenche les initialisations de ressources
 * propres au module Products de l'application
 *
 * @category MyApp
 * @package Products
 * @version 0.01
 * @since 2012-10-08
 * @author Moi <moi@monmail.com>
 */
class Products_Bootstrap extends Zend_Application_Module_Bootstrap
{
    protected function _initModuleRouter()
    {
    	$router = Zend_Controller_Front::getInstance()->getRouter();
    	$routerConfFile = __DIR__ . DIRECTORY_SEPARATOR . 
      					 'configs' .DIRECTORY_SEPARATOR . 
      					 'routes.ini';
    	$routerConf = new Zend_Config_Ini($routerConfFile, APPLICATION_ENV);
    	$router->addConfig($routerConf, 'routes');
    }
    
    protected function _initModuleNavigation()
    {
    	$navigation = $this->getApplication()
				    	   ->getResource('navigation');
    	$navigationConfFile = __DIR__ . DIRECTORY_SEPARATOR .
						     'configs' .DIRECTORY_SEPARATOR .
						     'navigation.ini';
    	$navigationConf = new Zend_Config_Ini($navigationConfFile, APPLICATION_ENV);
    	$moduleNavigation = new Zend_Navigation($navigationConf); 
    	$navigation->addPages($moduleNavigation);
    }
    
    protected function _initModuleTranslation()
    {
    	$translate = $this->getApplication()->getResource('translate');
    	$translate->addTranslation(
    		array('adapter' => 'array', 'content' => __DIR__ . '/i18n/')	
    	);
    }
}








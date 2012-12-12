<?php
/**
 * Formulaire de création de commande
 *
 * Défini le contenu et le comportement du
 * formulaire de création de commande avec Zend_Form
 *
 */

/**
 * Formulaire de création de commande
 *
 * Défini le contenu et le comportement du
 * formulaire de création de commande avec Zend_Form
 *
 *
 * @category MyApp
 * @package Products
 * @subpackage Form
 * @version 0.01
 * @since 2012-10-12
 * @author Moi <moi@monmail.com>
 * @uses Zend_Form
 */
class Products_Form_Commandeadd extends Zend_Form
{
    public function init()
    {
    	$checkboxDecorators = array(
    			'ViewHelper',
    			array(
    					array('div1' => 'HtmlTag'),
    					array(
    							'tag' => 'div',
    							'class' => 'controls ',
    					),
    			),
    			array(
    					array('div2' => 'HtmlTag'),
    					array(
    							'tag' => 'div',
    							'class' => 'control-group'
    					),
    			),
    	);
    	
    	// reference    	
    	$ref = new Zend_Form_Element_Text('ref');
    	$ref->setRequired(true)
    	->addFilter(
    			new Zend_Filter_StripTags()
    	)
    	->addValidator(
    			new Zend_Validate_StringLength(
    					array('min' => 2, 'max' => 20)
    			)
    	);
    	$this->addElement($ref);
    	
    	
    	// client
    	$clientSelect = new Zend_Form_Element_Select('clients');
    	
    	$clientMapper = new Products_Model_Mapper_Client();
    	$clients = $clientMapper->fetchAll();
    	$clientsArr = array();
    	foreach ($clients as $client) {
    		$clientsArr[$client->getId()] = $client->getClientNom() .' '. $client->getClientPrenom() . ' ('.$client->getClientId().')';
    	}
    
    	$clientSelect->addMultiOptions($clientsArr);
    	$this->addElement($clientSelect);
    	
    	
    	
    	// liste des produits
    	$produitService = new Products_Service_Produit();
    	$produits = $produitService->fetchall();
    	 
    	foreach($produits as $produit) {
    		$prodId = new Zend_Form_Element_Checkbox('prodId_'.$produit->getprodId());
    
    		//$prodId->setDecorators($checkboxDecorators);
    		$prodId->setLabel('prodId_'.$produit->getprodDesignation().' ('.$produit->getprodPrix().')');
    
    		
    		$this->addElement($prodId);
    	
    	}

    	
        

       /*

        $prixht = new Zend_Form_Element_Text('prixht');
        $prixht->setRequired(true)
        	  ->setValidators(
        	  		array(
        	  				new Zend_Validate_Float(),
        	  				new Zend_Validate_GreaterThan(0),
             			 )
                 	 );
        $this->addElement($prixht);
    	

        $stock = new Zend_Form_Element_Text('stock');
        $stock->setRequired(true)
                 ->setValidators(
        	  		array(
        	  				new Zend_Validate_Int(),
        	  				new Zend_Validate_GreaterThan(0),
             			 )
                 );
        $this->addElement($stock);
*/

        $achat = new Zend_Form_Element_Radio('paye');

        $achat	->addMultiOptions(array('1' => 'Commande réglée', '0' => 'Commande non réglée'))
        		->setValue(0);
        $this	->addElement($achat);
         
        $submit = new Zend_Form_Element_Submit('submit');
        $this->addElement($submit);
    }
}

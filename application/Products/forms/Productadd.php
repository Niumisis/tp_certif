<?php
/**
 * Formulaire d'ajout d'un produit
 *
 * Défini le contenu et le comportement du
 * formulaire d'ajout d'un produit avec Zend_Form
 *
 */

/**
 * Formulaire d'ajout d'un produit
 *
 * Défini le contenu et le comportement du
 * formulaire d'ajout d'un produit avec Zend_Form
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
class Products_Form_Productadd extends Zend_Form
{
    public function init()
    {
    	
        $ref = new Zend_Form_Element_Text('ref');
        $ref->setRequired(true)
              ->addFilter(
                   new Zend_Filter_StripTags()
              )
              ->addValidator(
                      new Zend_Validate_StringLength(
                          array('min' => 2, 'max' => 12)
                      )
              );
        $this->addElement($ref);

        $label = new Zend_Form_Element_Text('label');
        $label->setRequired(true)
                  ->addFilter(
                       new Zend_Filter_StripTags()
                  )
                  ->addValidator(
                          new Zend_Validate_StringLength(
                              array('min' => 5, 'max' => 200)
                          )
                  );
        $this->addElement($label);

        $description = new Zend_Form_Element_Textarea('description');
        $description->setRequired(true)
                 ->setFilters(
                 		array(
                       		new Zend_Filter_StripTags())
                 		)
                  
                 ->setValidators(
                 		array(
                 		  new Zend_Validate_Alnum(true),
                          new Zend_Validate_StringLength(
                              array('min' => 10)
                          ))
                  );
        $this->addElement($description);

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


        $tvaElt = new Zend_Form_Element_Select('tva');

        $tvaMapper = new Products_Model_Mapper_Tva();
        $Tva = $tvaMapper->fetchAll();
        $tvaArr = array();
        foreach ($Tva as $tva) {
            $tvaArr[$tva->getId()] = ($tva->getTvaTaux() / 100).' %';
        }

        $tvaElt->addMultiOptions($tvaArr);
        $this->addElement($tvaElt);

        
        $submit = new Zend_Form_Element_Submit('submit');
        $this->addElement($submit);
    }
}

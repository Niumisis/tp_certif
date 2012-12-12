<?php

/**
 * Formulaire d'ajout d'un postit
*
*/

/**
 * Formulaire d'ajout d'un postit
*
* @category MyApp
* @package Core
* @subpackage Form
* @version 0.01
* @since 2012-08-06
* @author Moi <moi@monmail.com>
* @uses Zend_Form
*/
class Core_Form_PostitAdd extends Zend_Form
{
	public function init()
	{
		$libelle = new Zend_Form_Element_Textarea('libelle');
		$libelle->setAttribs(
			array (
					'cols'=>'80',	
					'rows'=>'5',	
				)		
			)
				->addFilter(new Zend_Filter_StripTags())
				->addValidator(new Zend_Validate_StringLength(
							array(
								'min' => 3,
								'max' => 120
								)
						))
				->setRequired(true);
		
		$this->addElement($libelle);
		
		$submit = new Zend_Form_Element_Submit('submit');
		$this->addElement($submit);
		
		$this->setDecorators(
			array (
				array ('ViewScript', 
						array(
							'viewScript' => 'postit/form.phtml'
							  )
						),
				'Form'	
				)	
		);
		
		$this->setAttrib('id', 'postit-form');		
	}
}











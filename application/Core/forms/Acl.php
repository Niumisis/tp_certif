<?php 

class Core_Form_Acl extends Zend_Form
{
	private $resources;
	private $roleid;
	
	public function __construct(array $resources, $roleid)
	{
		$this->resources = $resources;
		$this->roleid = (int) $roleid;
		parent::__construct();
	}
	
	public function init()
	{
		$roleid = new Zend_Form_Element_Hidden('role');
		$roleid->setValue($this->roleid)
		       ->addValidator(new Zend_Validate_Int())
			   ->addValidator(new Zend_Validate_GreaterThan(0));
		
		$this->addElement($roleid);
		
		$checkboxDecorators = array(
								'ViewHelper',
								array(
                					array('div1' => 'HtmlTag'),
					                array(
					                    'tag' => 'div',
					                    'class' => 'controls '
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
		
		
		foreach ($this->resources as $resource => $privileges) {
			$privileges = array_flip($privileges);
			array_walk(
				$privileges,
				function(&$value, $key) {
					$value = $key;
				}
			);
			${$resource} = new Zend_Form_Element_MultiCheckbox($resource);
			${$resource}->setLabel('Privilege pour la ressource ' . $resource)
						->addMultiOptions($privileges)
						->setSeparator('')
						->setDecorators($checkboxDecorators);
		
			$this->addElement(${$resource});
			$this->addDisplayGroup(array($resource), 'dg-' .$resource, array('legend' => $resource));
		}

		$submit = new Zend_Form_Element_Submit('submit');
		$submit->setLabel('Enregistrer les droits');
		
		$this->addElement($submit);
		$this->addDisplayGroup(array('submit'), $submit);
		
		$this->setDisplayGroupDecorators( array(
			'FormElements',
			'Fieldset'	
		));
	}
	
}
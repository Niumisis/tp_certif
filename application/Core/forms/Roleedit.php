<?php

class Core_Form_Roleedit extends Zend_Form
{
	private $actionList;
	
	public function __construct($actionList)
	{
		$this->actionList = $actionList;
		parent::__construct();
	}
	
	public function init()
	{
		$this->setMethod('POST');
		
		foreach ($this->actionList as $resource => $privileges) {
			foreach ($privileges as $key => $privilege) {
				$element = new Zend_Form_Element_Checkbox($resource.'_'.$privilege);
				$element->setLabel($resource . ' ' . $privilege);
				$this->addElement($element);
			}
		}
		$this->addElement(new Zend_Form_Element_Submit('submit'));
	}
}
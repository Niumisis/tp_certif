<?php 

class Core_Form_Edit extends Zend_Form
{
	private $array;
	
	public function __construct($array)
	{
		$this->array = $array;
		parent::__construct();
	}
	
	
}

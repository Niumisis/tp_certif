<?php

class Core_Model_DbTable_Privilege extends Zend_Db_Table_Abstract
{
	protected $_name = 'test_allows';
	
	protected $_primary = array('resource_name','r_id');
	
	protected $_referenceMap = array(
				'test_allows_role_FK' => array(
							'columns' => array('r_id'),
							'refColumns' => array('r_id'),
							'refTableClass' => 'Core_Model_DbTable_Role',
							'onDelete' => self::CASCADE,
							'onUpdate' => self::CASCADE
						)
			);
	
	
}
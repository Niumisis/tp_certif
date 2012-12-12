<?php
class Products_Model_Mapper_CommandeEtat extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Products_Model_DbTable_ComandeEtat';
	
	const COL_ID = 'commande_etat_id';
	const COL_LABEL = 'commande_etat_label';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		
		$commendeEtat = new Products_Model_CommandeEtat();
		$commendeEtat->setCommandeEtatId($row[self::COL_ID]);
		$commendeEtat->setCommandeEtatLabel($row[self::COL_LABEL]);

		return $commendeEtat;
	}
	
	public function objectToArray($commendeEtat)
	{
		$data[self::COL_ID] = $commendeEtat->getId();
		$data[self::COL_LABEL] = $commendeEtat->getCommandeEtatLabel();
	
		return $data;
	}
}
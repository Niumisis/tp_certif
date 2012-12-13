<?php
class Products_Model_Mapper_Client extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Products_Model_DbTable_Client';
	
	const COL_ID = 'client_id';
	const COL_NOM = 'client_nom';
	const COL_PRENOM = 'client_prenom';
	const COL_ADRESSE = 'client_adresse';
	const COL_VILLE = 'client_ville';
	const COL_EMAIL = 'client_email';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{	
		$client = new Products_Model_Client();
		$client->setClientId($row[self::COL_ID]);
		$client->setClientNom($row[self::COL_NOM]);
		$client->setClientPrenom($row[self::COL_PRENOM]);
		$client->setClientAdresse($row[self::COL_ADRESSE]);
		$client->setClientVille($row[self::COL_VILLE]);
		$client->setClientEmail($row[self::COL_EMAIL]);
	
		return $client;
	}
	
	public function objectToArray($client)
	{
		$data[self::COL_ID] = $client->getId();
		$data[self::COL_NOM] = $client->getClientNom();
		$data[self::COL_PRENOM] = $client->getClientPrenom();
		$data[self::COL_ADRESSE] = $client->getClientAdresse();
		$data[self::COL_VILLE] = $client->getVille();
		$data[self::COL_EMAIL] = $client->getEmail();
	
		return $data;
	}
}
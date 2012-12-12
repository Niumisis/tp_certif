<?php
class Products_Model_Mapper_Commande extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Products_Model_DbTable_Commande';
	
	const COL_ID = 'commande_id';
	const COL_DATE = 'commande_date';
	const COL_REF = 'commande_ref';
	const COL_ETAT_ID = 'commande_etat_id';
	const COL_CLIENT_ID = 'commande_client_id';
	const COL_REGLEMENT = 'commande_reglement';
	const COL_MONTANT_HT = 'commande_montant_ht';
	const COL_MONTANT_TTC = 'commande_montant_ttc';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		$etatMapper = new Products_Model_Mapper_CommandeEtat();
			
		$etat = $etatMapper->rowToObject(
				$row->findParentRow('Products_Model_DbTable_CommandeEtat', 'commande_etat_FK')
		);
	
		$clientMapper = new Products_Model_Mapper_Client();
			
		$client = $clientMapper->rowToObject(
				$row->findParentRow('Products_Model_DbTable_Client', 'commande_client_FK')
		);
			
			
		$commande = new Products_Model_Commande();
		$commande->setCommandeId($row[self::COL_ID]);
		$commande->setCommandeDate($row[self::COL_DATE]);
		$commande->setCommandeRef($row[self::COL_REF]);
		$commande->setCommandeEtatId($etat->getId());
		$commande->setCommandeClientId($client->getId());
		$commande->setCommandeReglement($row[self::COL_REGLEMENT]);
		$commande->setCommandeMontantHt($row[self::COL_MONTANT_HT]);
		$commande->setCommandeMontantTtc($row[self::COL_MONTANT_TTC]);
	
		return $commande;
	}
	
	public function objectToArray($commande)
	{
		$data[self::COL_ID] = $commande->getId();
		$data[self::COL_DATE] = $commande->getCommandeDate();
		$data[self::COL_REF] = $commande->getCommandeRef();
		$data[self::COL_ETAT_ID] = $commande->getCommandeEtatId();
		$data[self::COL_CLIENT_ID] = $commande->getCommandeClientId();
		$data[self::COL_REGLEMENT] = $commande->getCommandeReglement();
		$data[self::COL_MONTANT_HT] = $commande->getCommandeMontantHt();
		$data[self::COL_MONTANT_TTC] = $commande->getCommandeMontantTtc();
	
		return $data;
	}
}
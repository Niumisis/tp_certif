<?php
class Products_Model_Mapper_CommandeProduit extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Products_Model_DbTable_CommandeProduit';
	
	const COL_ID = 'commande_id';
	const COL_COMMANDE_ID = 'commande_id';
	const COL_PRODUIT_ID = 'produit_id';
	const COL_QUANTITE = 'commandes_produits_quantite';
	const COL_PRIX_HT = 'commandes_produits_prix_ht';
	const COL_TVA = 'commandes_produits_tva';
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		$commandeMapper = new Products_Model_Mapper_Commande();
			
		$commande = $commandeMapper->rowToObject(
				$row->findParentRow('Core_Model_DbTable_Commandes', 'cp_commande_FK')
		);
		
		$produitMapper = new Products_Model_Mapper_Produit();
		 
		$produit = $produitMapper->rowToObject(
				$row->findParentRow('Core_Model_DbTable_Produits', 'cp_produit_FK')
		);
		 
		 
		$commandeProduit = new Products_Model_CommandeProduit();
		$commandeProduit->setCommandesId($commande->getId());
		$commandeProduit->setProduitsId($produit->getId());
		$commandeProduit->setCommandesProduitsQuantite($row[self::COL_QUANTITE]);
		$commandeProduit->setCommandesProduitsPrixHt($row[self::COL_PRIX_HT]);
		$commandeProduit->setCommandesProduitsTva($row[self::COL_TVA]);
	
		return $commandeProduit;
	}
	
	public function objectToArray($commandeProduit)
	{
		$data[self::COL_COMMANDE_ID] = $commandeProduit->getCommandeId();
		$data[self::COL_PRODUIT_ID] = $commandeProduit->getProduitId();
		$data[self::COL_QUANTITE] = $commandeProduit->getCommandesProduitsQuantite();
		$data[self::COL_PRIX_HT] = $commandeProduit->getCommandesProduitsPrixHt();
		$data[self::COL_TVA] = $commandeProduit->getCommandesProduitsTva();
	
		return $data;
	}
	
	public function save(Core_Model_Interface $entity)
	{
		$data = $this->objectToArray($entity);
		return $this->getDbTable()->insert($data);
	}
}
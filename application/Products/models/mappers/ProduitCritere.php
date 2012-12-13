<?php

class Products_Model_Mapper_ProduitCritere extends Core_Model_Mapper_Abstract
{
    protected $_dbTableClass = 'Products_Model_DbTable_ProduitCritere';

    const COL_ID = 'produits_criteres_id';
    const COL_PRODUIT_ID = 'produit_id';
    const COL_PRODUITS_CRITERES_LABEL = 'produits_criteres_label';
    const COL_PRODUITS_CRITERES_VALEUR = 'produits_criteres_valeur';
    
    public function rowToObject(Zend_Db_Table_Row_Abstract $row)
    {
    	$produitMapper = new Products_Model_Mapper_Produit();
    	
    	$produit = $produitMapper->rowToObject(
    			$row->findParentRow('Core_Model_DbTable_Produits', 'criteres_produits_FK')
    	);
    	
    	
        $produitCritere = new Products_Model_ProduitCritere();
        $produitCritere->setId($row[self::COL_ID]);   
        $produitCritere->setProduit($produit);
        $produitCritere->setProduitsCriteresLabel($row[self::COL_PRODUITS_CRITERES_LABEL]);
        $produitCritere->setProduitsCriteresValeur($row[self::COL_PRODUITS_CRITERES_VALEUR]);

        return $produitCritere;
    }

    public function objectToArray($produitCritere)
    {
        $data[self::COL_ID] = $produitCritere->getId();
        $data[self::COL_PRODUIT] = $produitCritere->getProduit()->getId();
        $data[self::COL_PRODUITS_CRITERES_LABEL] = $produitCritere->getProduitsCriteresLabel();
        $data[self::COL_PRODUITS_CRITERES_VALEUR] = $produitCritere->getProduitsCriteresValeur();
  
        return $data;
    }
}
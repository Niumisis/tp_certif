<?php

class Products_Model_Mapper_Produit extends Core_Model_Mapper_Abstract
{
	protected $_dbTableClass = 'Products_Model_DbTable_Produit';
	
	const COL_ID = 'prod_id';
	const COL_REFERENCE = 'prod_reference';
	const COL_DESIGNATION = 'prod_designation';
	const COL_DESCRIPTION = 'prod_description';
	const COL_STOCK = 'prod_stock';
	const COL_PRIXHT = 'prod_prix';
	const COL_TAXEID = 'prod_tva_id';
	
	public function objectToArray($produit)
	{
		$data[self::COL_ID] = $produit->getId();
		$data[self::COL_REFERENCE] = $produit->getProdReference();
		$data[self::COL_DESIGNATION] = $produit->getProdDesignation();
		$data[self::COL_DESCRIPTION] = $produit->getProdDescription();
		$data[self::COL_STOCK] = $produit->getProdStock();
		$data[self::COL_PRIXHT] = $produit->getProdPrix();
		$data[self::COL_TAXEID] = $produit->getProdTvaId();
		
		return $data;
	}
	
	public function rowToObject(Zend_Db_Table_Row_Abstract $row)
	{
		
		$produit = new Products_Model_Produit();
		$produit->setProdId($row[self::COL_ID]);
		$produit->setProdReference($row[self::COL_REFERENCE]);
		$produit->setProdDesignation($row[self::COL_DESIGNATION]);
		$produit->setProdDescription($row[self::COL_DESCRIPTION]);
		$produit->setProdStock($row[self::COL_STOCK]);
		$produit->setProdPrix($row[self::COL_PRIXHT]);
		$produit->setProdTvaId($row[self::COL_TAXEID]);
		
		return $produit;
	}
}
<?php

/**
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_Produit implements Core_Model_Interface
{
	private $prodId;
	private $prodReference;
	private $prodDesignation;
	private $prodDescription;
	private $prodPrix;
	private $prodStock;
	private $prodTvaId;
	private $tva;
	/**
	 * @return the $prodId
	 */
	public function getId() {
		return $this->prodId;
	}	
	/**
	 * @return the $prodId
	 */
	public function getProdId() {
		return $this->prodId;
	}

	/**
	 * @param field_type $prodId
	 */
	public function setProdId($prodId) {
		$this->prodId = $prodId;
		return $this;
	}

	/**
	 * @return the $prodReference
	 */
	public function getProdReference() {
		return $this->prodReference;
	}

	/**
	 * @param field_type $prodReference
	 */
	public function setProdReference($prodReference) {
		$this->prodReference = $prodReference;
		return $this;
	}

	/**
	 * @return the $prodDesignation
	 */
	public function getProdDesignation() {
		return $this->prodDesignation;
	}

	/**
	 * @param field_type $prodDesignation
	 */
	public function setProdDesignation($prodDesignation) {
		$this->prodDesignation = $prodDesignation;
		return $this;
	}

	/**
	 * @return the $prodDescription
	 */
	public function getProdDescription() {
		return $this->prodDescription;
	}

	/**
	 * @param field_type $prodDescription
	 */
	public function setProdDescription($prodDescription) {
		$this->prodDescription = $prodDescription;
		return $this;
	}

	/**
	 * @return the $prodPrix
	 */
	public function getProdPrix() {
		return $this->prodPrix;
	}

	/**
	 * @param field_type $prodPrix
	 */
	public function setProdPrix($prodPrix) {
		$this->prodPrix = $prodPrix;
		return $this;
	}

	/**
	 * @return the $prodStock
	 */
	public function getProdStock() {
		return $this->prodStock;
	}

	/**
	 * @param field_type $prodStock
	 */
	public function setProdStock($prodStock) {
		$this->prodStock = $prodStock;
		return $this;
	}

	/**
	 * @return the $prodTvaId
	 */
	public function getProdTvaId() {
		return $this->prodTvaId;
	}

	/**
	 * @param field_type $prodTvaId
	 */
	public function setProdTvaId($prodTvaId) {
		$this->prodTvaId = $prodTvaId;
		return $this;
	}
	
	public function getTva()
	{
		if (null == $this->tva) {
			$tvaMapper = new Products_Model_Mapper_Tva();
			$this->tva = $tvaMapper->find($this->prodTvaId);
		}	
		return $this->tva;
		
	}

}

















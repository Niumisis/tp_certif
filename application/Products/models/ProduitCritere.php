<?php

/**
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_ProduitCritere implements Core_Model_Interface
{
	private $produitsCriteresId;
	private $produitsId;
	private $produitsCriteresLabel;
	private $produitsCriteresValeur;
	/**
	 * @return the $produitsCriteresId
	 */
	public function getId() {
		return $this->produitsCriteresId;
	}
	/**
	 * @return the $produitsCriteresId
	 */
	public function getProduitsCriteresId() {
		return $this->produitsCriteresId;
	}

	/**
	 * @param field_type $produitsCriteresId
	 */
	public function setProduitsCriteresId($produitsCriteresId) {
		$this->produitsCriteresId = $produitsCriteresId;
	}

	/**
	 * @return the $produitsId
	 */
	public function getProduitsId() {
		return $this->produitsId;
	}

	/**
	 * @param field_type $produitsId
	 */
	public function setProduitsId($produitsId) {
		$this->produitsId = $produitsId;
	}

	/**
	 * @return the $produitsCriteresLabel
	 */
	public function getProduitsCriteresLabel() {
		return $this->produitsCriteresLabel;
	}

	/**
	 * @param field_type $produitsCriteresLabel
	 */
	public function setProduitsCriteresLabel($produitsCriteresLabel) {
		$this->produitsCriteresLabel = $produitsCriteresLabel;
	}

	/**
	 * @return the $produitsCriteresValeur
	 */
	public function getProduitsCriteresValeur() {
		return $this->produitsCriteresValeur;
	}

	/**
	 * @param field_type $produitsCriteresValeur
	 */
	public function setProduitsCriteresValeur($produitsCriteresValeur) {
		$this->produitsCriteresValeur = $produitsCriteresValeur;
	}

}

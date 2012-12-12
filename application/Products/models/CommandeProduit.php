<?php

/**
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_CommandeProduit implements Core_Model_Interface
{
	private $commandeId;
	private $produitId;
	private $commandesProduitsQuantite;
	private $commandesProduitsPrixHt;
	private $commandesProduitsTva;
	/**
	 * @return the $commandeId
	 */
	public function getId() {
		return $this->commandeId;
	}
	/**
	 * @return the $commandeId
	 */
	public function getCommandeId() {
		return $this->commandeId;
	}

	/**
	 * @param field_type $commandeId
	 */
	public function setCommandeId($commandeId) {
		$this->commandeId = $commandeId;
	}

	/**
	 * @return the $produitId
	 */
	public function getProduitId() {
		return $this->produitId;
	}

	/**
	 * @param field_type $produitId
	 */
	public function setProduitId($produitId) {
		$this->produitId = $produitId;
	}

	/**
	 * @return the $commandesProduitsQuantite
	 */
	public function getCommandesProduitsQuantite() {
		return $this->commandesProduitsQuantite;
	}

	/**
	 * @param field_type $commandesProduitsQuantite
	 */
	public function setCommandesProduitsQuantite($commandesProduitsQuantite) {
		$this->commandesProduitsQuantite = $commandesProduitsQuantite;
	}

	/**
	 * @return the $commandesProduitsPrixHt
	 */
	public function getCommandesProduitsPrixHt() {
		return $this->commandesProduitsPrixHt;
	}

	/**
	 * @param field_type $commandesProduitsPrixHt
	 */
	public function setCommandesProduitsPrixHt($commandesProduitsPrixHt) {
		$this->commandesProduitsPrixHt = $commandesProduitsPrixHt;
	}

	/**
	 * @return the $commandesProduitsTva
	 */
	public function getCommandesProduitsTva() {
		return $this->commandesProduitsTva;
	}

	/**
	 * @param field_type $commandesProduitsTva
	 */
	public function setCommandesProduitsTva($commandesProduitsTva) {
		$this->commandesProduitsTva = $commandesProduitsTva;
	}

}

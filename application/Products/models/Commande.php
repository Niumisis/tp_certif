<?php
/**
 * Modele de domaine Commande
 *
 * Représente l'entité Commande
 *
 */

/**
 * Modele de domaine Commande
 *
 * Représente l'entité Commande
 *
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_Commande implements Core_Model_Interface
{
	private $commandeId; 
	private $commandeDate; 
	private $commandeRef; 
	private $commandeEtatId;
	private $commandeClientId; 
	private $commandeReglement; 
	private $commandeMontantHt; 
	private $commandeMontantTtc;
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
	 * @return the $commandeDate
	 */
	public function getCommandeDate() {
		return $this->commandeDate;
	}

	/**
	 * @param field_type $commandeDate
	 */
	public function setCommandeDate($commandeDate) {
		$this->commandeDate = $commandeDate;
	}

	/**
	 * @return the $commandeRef
	 */
	public function getCommandeRef() {
		return $this->commandeRef;
	}

	/**
	 * @param field_type $commandeRef
	 */
	public function setCommandeRef($commandeRef) {
		$this->commandeRef = $commandeRef;
	}

	/**
	 * @return the $commandeEtat_id
	 */
	public function getCommandeEtatId() {
		return $this->commandeEtatId;
	}

	/**
	 * @param field_type $commandeEtat_id
	 */
	public function setCommandeEtatId($commandeEtatId) {
		$this->commandeEtatId = $commandeEtatId;
	}

	/**
	 * @return the $commandeClient_id
	 */
	public function getCommandeClientId() {
		return $this->commandeClientId;
	}

	/**
	 * @param field_type $commandeClientId
	 */
	public function setCommandeClientId($commandeClientId) {
		$this->commandeClientId = $commandeClientId;
	}

	/**
	 * @return the $commandeReglement
	 */
	public function getCommandeReglement() {
		return $this->commandeReglement;
	}

	/**
	 * @param field_type $commandeReglement
	 */
	public function setCommandeReglement($commandeReglement) {
		$this->commandeReglement = $commandeReglement;
	}

	/**
	 * @return the $commandeMontantHt
	 */
	public function getCommandeMontantHt() {
		return $this->commandeMontantHt;
	}

	/**
	 * @param field_type $commandeMontantHt
	 */
	public function setCommandeMontantHt($commandeMontantHt) {
		$this->commandeMontantHt = $commandeMontantHt;
	}

	/**
	 * @return the $commandeMontantTtc
	 */
	public function getCommandeMontantTtc() {
		return $this->commandeMontantTtc;
	}

	/**
	 * @param field_type $commandeMontantTtc
	 */
	public function setCommandeMontantTtc($commandeMontantTtc) {
		$this->commandeMontantTtc = $commandeMontantTtc;
	}

}

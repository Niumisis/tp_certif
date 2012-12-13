<?php

/**
 *
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_CommandeEtat implements Core_Model_Interface
{
	private $commandeEtatId;
	private $commandeEtatLabel;
	/**
	 * @return the $commandeEtatId
	 */
	public function getId() {
		return $this->commandeEtatId;
	}
	/**
	 * @return the $commandeEtatId
	 */
	public function getCommandeEtatId() {
		return $this->commandeEtatId;
	}

	/**
	 * @param field_type $commandeEtatId
	 */
	public function setCommandeEtatId($commandeEtatId) {
		$this->commandeEtatId = $commandeEtatId;
	}

	/**
	 * @return the $commandeEtatLabel
	 */
	public function getCommandeEtatLabel() {
		return $this->commandeEtatLabel;
	}

	/**
	 * @param field_type $commandeEtatLabel
	 */
	public function setCommandeEtatLabel($commandeEtatLabel) {
		$this->commandeEtatLabel = $commandeEtatLabel;
	}

}

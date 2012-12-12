<?php
/**
 * Modele de domaine Client
 *
 * Représente l'entité Client
 *
 */

/**
 * Modele de domaine Client
 *
 * Représente l'entité Client
 *
 *
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_Client  implements Core_Model_Interface
{
	/**
	 * @var int
	 */
	private $clientId;
	/**
	 * @var string
	 */
	private $clientNom;
	/**
	 * @var string
	 */
	private $clientPrenom;
	/**
	 * @var string
	 */
	private $clientAdresse;
	/**
	 * @var string
	 */
	private $clientVille;
	/**
	 * @var string
	 */
	private $clientEmail;
	/**
	 * @return the $clientId
	 */
	public function getId() {
		return $this->clientId;
	}
	/**
	 * @return the $clientId
	 */
	public function getClientId() {
		return $this->clientId;
	}

	/**
	 * @param number $clientId
	 */
	public function setClientId($clientId) {
		$this->clientId = $clientId;
	}

	/**
	 * @return the $clientNom
	 */
	public function getClientNom() {
		return $this->clientNom;
	}

	/**
	 * @param string $clientNom
	 */
	public function setClientNom($clientNom) {
		$this->clientNom = $clientNom;
	}

	/**
	 * @return the $clientPrenom
	 */
	public function getClientPrenom() {
		return $this->clientPrenom;
	}

	/**
	 * @param string $clientPrenom
	 */
	public function setClientPrenom($clientPrenom) {
		$this->clientPrenom = $clientPrenom;
	}

	/**
	 * @return the $clientAdresse
	 */
	public function getClientAdresse() {
		return $this->clientAdresse;
	}

	/**
	 * @param string $clientAdresse
	 */
	public function setClientAdresse($clientAdresse) {
		$this->clientAdresse = $clientAdresse;
	}

	/**
	 * @return the $clientVille
	 */
	public function getClientVille() {
		return $this->clientVille;
	}

	/**
	 * @param string $clientVille
	 */
	public function setClientVille($clientVille) {
		$this->clientVille = $clientVille;
	}

	/**
	 * @return the $clientEmail
	 */
	public function getClientEmail() {
		return $this->clientEmail;
	}

	/**
	 * @param string $clientEmail
	 */
	public function setClientEmail($clientEmail) {
		$this->clientEmail = $clientEmail;
	}


}

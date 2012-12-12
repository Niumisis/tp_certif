<?php
/**
 * Objet de domaine : postit
 *
 * Représente une entité de domaine postit
 *
 */

/**
 *  Objet de domaine : postit
 *
 * Représente une entité de domaine postit
 *
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @example <br />
 *          Instanciation : <br />
 *          <b>$postit = new Core_Model_Postit();</b>
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Core_Model_Postit implements Core_Model_Interface
{
    /**
     * @var integer
     */
    private $id;
    /**
     * @var integer
     */
    private $userId;
    /**
     * @var string
     */
    private $libelle;
    /**
     * @var string
     */
    private $date;
	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param number $id
	 */
	public function setId($id) {
		$this->id = $id;
		return $this;
	}

	/**
	 * @return the $userId
	 */
	public function getUserId() {
		return $this->userId;
	}

	/**
	 * @param number $userId
	 */
	public function setUserId($userId) {
		$this->userId = $userId;
		return $this;
	}

	/**
	 * @return the $libelle
	 */
	public function getLibelle() {
		return $this->libelle;
	}

	/**
	 * @param string $libelle
	 */
	public function setLibelle($libelle) {
		$this->libelle = $libelle;
		return $this;
	}

	/**
	 * @return the $date
	 */
	public function getDate() {
		return $this->date;
	}

	/**
	 * @param string $date
	 */
	public function setDate($date) {
		$this->date = $date;
		return $this;
	}

    
}














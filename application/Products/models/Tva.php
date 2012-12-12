<?php
/**
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_Tva implements Core_Model_Interface
{
  private $tvaId;
  private $tvaTaux;
  /**
   * @return the $tvaId
   */
  public function getId() {
  	return $this->tvaId;
  }
/**
	 * @return the $tvaId
	 */
	public function getTvaId() {
		return $this->tvaId;
	}

/**
	 * @param field_type $tvaId
	 */
	public function setTvaId($tvaId) {
		$this->tvaId = $tvaId;
	}

/**
	 * @return the $tvaTaux
	 */
	public function getTvaTaux() {
		return $this->tvaTaux;
	}

/**
	 * @param field_type $tvaTaux
	 */
	public function setTvaTaux($tvaTaux) {
		$this->tvaTaux = $tvaTaux;
	}

}

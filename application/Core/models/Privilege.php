<?php
/**
 * Objet de domaine : privilege
 *
 * Représente une association privilege / role
 *
 */

/**
 * Objet de domaine : privilege
 *
 * Représente une association privilege / role
 *
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2012-09-07
 * @author Moi <moi@monmail.com>
 */
class Core_Model_Privilege
{
    /**
     * @var integer
     */
    private $roleId;
    /**
     * @var string
     */
    private $resourceName;
    /**
     * @var string
     */
    private $privileges;
	/**
	 * @return the $roleId
	 */
	public function getRoleId() {
		return $this->roleId;
	}

	/**
	 * @param number $roleId
	 */
	public function setRoleId($roleId) {
		$this->roleId = $roleId;
	}

	/**
	 * @return the $resourceName
	 */
	public function getResourceName() {
		return $this->resourceName;
	}

	/**
	 * @param string $resourceName
	 */
	public function setResourceName($resourceName) {
		$this->resourceName = $resourceName;
	}

	/**
	 * @return the $privileges
	 */
	public function getPrivileges() {
		return $this->privileges;
	}

	/**
	 * @param string $privileges
	 */
	public function setPrivileges($privileges) {
		$this->privileges = $privileges;
	}

    
    
}

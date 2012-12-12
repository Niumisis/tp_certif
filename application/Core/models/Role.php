<?php
/**
 * Objet de domaine : rôle
 *
 * Représente une entité de domaine rôle
 *
 */

/**
 * Objet de domaine : rôle
 *
 * Représente une entité de domaine rôle
 *
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @example <br />
 *          Instanciation : <br />
 *          <b>$role = new Core_Model_Role();</b>
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Core_Model_Role implements Core_Model_Interface
{
    /**
     * @var integer
     */
    private $_id;
    /**
     * @var string
     */
    private $_label;
    /**
     * @return the $_id
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param integer $_id
     */
    public function setId($_id)
    {
        $this->_id = $_id;

        return $this;
    }

    /**
     * @return the $_label
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * @param string $_label
     */
    public function setLabel($_label)
    {
        $this->_label = $_label;

        return $this;
    }

}

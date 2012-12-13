<?php
/**
 * Objet de domaine : utilisateur
 *
 * Représente une entité de domaine utilisateur
 *
 */

/**
 * Objet de domaine : utilisateur
 *
 * Représente une entité de domaine utilisateur
 *
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @example <br />
 *          Instanciation : <br />
 *          <b>$user = new Core_Model_User();</b>
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Core_Model_User implements Core_Model_Interface
{
    /**
     * @var integer
     */
    private $_id;
    /**
     * @var Core_Model_Role
     */
    private $_login;
    /**
     * @var string
     */
    private $_password;
    /**
     * @var string
     */
    private $_email;
    /**
     * @var string
     */
    private $_firstname;
    /**
     * @var string
     */
    private $_lastname;
    /**
     * @return int L'id de l'utilisateur
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param int $_id
     */
    public function setId($_id)
    {
        $this->_id = $_id;

        return $this;
    }

    /**
     * @return string L'identifiant de l'utilisateur
     */
    public function getLogin()
    {
        return $this->_login;
    }

    /**
     * @param string $_login
     */
    public function setLogin($_login)
    {
        $this->_login = $_login;

        return $this;
    }

    /**
     * @return string Le mot de passe (hashé SHA1) de l'utilisateur
     */
    public function getPassword()
    {
        return $this->_password;

    }

    /**
     * @param string $_password
     */
    public function setPassword($_password)
    {
        $this->_password = $_password;

        return $this;
    }

    /**
     * @return string L'email de l'utilisateur
     */
    public function getEmail()
    {
        return $this->_email;
    }

    /**
     * @param string $_email
     */
    public function setEmail($_email)
    {
        $this->_email = $_email;

        return $this;
    }

    /**
     * @return string Le prénom de l'utilisateur
     */
    public function getFirstname()
    {
        return $this->_firstname;
    }

    /**
     * @param string $_firstname
     */
    public function setFirstname($_firstname)
    {
        $this->_firstname = $_firstname;

        return $this;
    }

    /**
     * @return string Le nom de l'utilisateur
     */
    public function getLastname()
    {
        return $this->_lastname;
    }

    /**
     * @param string $_lastname
     */
    public function setLastname($_lastname)
    {
        $this->_lastname = $_lastname;

        return $this;
    }
  

}

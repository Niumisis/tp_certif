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
class Core_Model_User
{

    /**
     *  @var string
     *  @desc Variable de type : int
     *        Longueur : 10 unsigned
     */

    private $userId;

    /**
     *  @var string
     *  @desc Variable de type : varchar
     *        Longueur : 50
     */

    private $userLogin;

    /**
     *  @var string
     *  @desc Variable de type : varchar
     *        Longueur : 50
     */

    private $userPwd;

    /**
     *  @var string
     *  @desc Variable de type : tinyint
     *        Longueur : 4
     */

    private $userAdmin;
    /**
     *  @return $userId
     */

    public function getUserId()
    {
        return $this->userId;
    }

    /**
     *  @param string $userId
     *  @desc dÃ©finit la variable : userId de type <b>string</b>
     */

    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     *  @return $userLogin
     */

    public function getUserLogin()
    {
        return $this->userLogin;
    }

    /**
     *  @param string $userLogin
     *  @desc dÃ©finit la variable : userLogin de type <b>string</b>
     */

    public function setUserLogin($userLogin)
    {
        $this->userLogin = $userLogin;

        return $this;
    }

    /**
     *  @return $userPwd
     */

    public function getUserPwd()
    {
        return $this->userPwd;
    }

    /**
     *  @param string $userPwd
     *  @desc dÃ©finit la variable : userPwd de type <b>string</b>
     */

    public function setUserPwd($userPwd)
    {
        $this->userPwd = $userPwd;

        return $this;
    }

    /**
     *  @return $userAdmin
     */

    public function getUserAdmin()
    {
        return $this->userAdmin;
    }

    /**
     *  @param string $userAdmin
     *  @desc dÃ©finit la variable : userAdmin de type <b>string</b>
     */

    public function setUserAdmin($userAdmin)
    {
        $this->userAdmin = $userAdmin;

        return $this;
    }

}

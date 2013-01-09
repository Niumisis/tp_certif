<?php
/**
 * Mapper pour les utilisateurs
 *
 * Le mapper assure le lien avec la persistence
 * assurée par Core_Model_DbTable_User pour les objets
 * de domaine Core_Model_User
 *
 */

/**
 * Mapper pour les utilisateurs
 *
 * Le mapper assure le lien avec la persistence
 * assurée par Core_Model_DbTable_User pour les objets
 * de domaine Core_Model_User
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @example <br />
 *          Instanciation : <br />
 *          <b>$userMapper = new Core_Model_Mapper_User();</b>
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Core_Model_Mapper_User extends Core_Model_Mapper_Abstract
{
    protected $_dbTableClass = 'Core_Model_DbTable_User';

    const COL_ID = 'user_id';
  //  const COL_ROLE_ID = 'r_id';
    const COL_LOGIN = 'user_login';
    const COL_PASSWORD = 'user_pwd';
    const COL_ADMIN = 'user_admin';

    public function fetchAll()
    {
        $rowSet = $this->getDbTable()->fetchAll();
        if (0 === $rowSet->count()) {
            return false;
        }
        $userCollection = new Core_Model_UserCollection();
        foreach ($rowSet as $row) {
            $userCollection->add($this->rowToObject($row));
        }

        return $userCollection;
    }

    public function rowToObject(Zend_Db_Table_Row_Abstract $row)
    {
       /* $roleMapper = new Core_Model_Mapper_Role();

        $role = $roleMapper->rowToObject(
            $row->findParentRow('Core_Model_DbTable_Role', 'FK_role')
        );*/

        $user = new Core_Model_User();
        $user->setUserId($row[self::COL_ID]);
     //   $user->setRole($role);
        $user->setUserLogin($row[self::COL_LOGIN]);
        $user->setUserPwd($row[self::COL_PASSWORD]);
        $user->setUserAdmin($row[self::COL_ADMIN]);

        return $user;
    }

    public function objectToArray($user)
    {
        $data[self::COL_ID] = $user->getUserId();
     //   $data[self::COL_ROLE_ID] = $user->getRole()->getId();
        $data[self::COL_LOGIN] = $user->getUserLogin();
        $data[self::COL_PASSWORD] = $user->getUserPwd();
        $data[self::COL_ADMIN] = $user->getUserAdmin();

        return $data;
    }
}

<?php
/**
 * Mapper pour les questions
 *
 * Le mapper assure le lien avec la persistence
 * assurée par Core_Model_DbTable_Questions pour les objets
 * de domaine Core_Model_Questions
 *
 */

/**
 * Mapper pour les questions
 *
 * Le mapper assure le lien avec la persistence
 * assurée par Core_Model_DbTable_Questions pour les objets
 * de domaine Core_Model_Questions
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @example <br />
 *          Instanciation : <br />
 *          <b>$questionsMapper = new Core_Model_Mapper_Questions();</b>
 * @version 0.01
 * @since 2013-01-07
 * @author Moi <moi@monmail.com>
 */
class Core_Model_Mapper_Tags extends Core_Model_Mapper_Abstract
{
    protected $_dbTableClass = 'Core_Model_DbTable_Tags';

    const COL_ID = 'tags_id';
    const COL_LABEL = 'tags_label';

    public function fetchAll($where = null)
    {
        $rowSet = $this->getDbTable()->fetchAll($where);
        if (0 === $rowSet->count()) {
            return false;
        }
        $userCollection = new Core_Model_UserCollection();
      /*  foreach ($rowSet as $row) {
            $userCollection->add($this->rowToObject($row));
        }*/

        return $rowSet;
    }

    public function rowToObject(Zend_Db_Table_Row_Abstract $row)
    {

        $user = new Core_Model_User();
        $user->setTagsId($row[self::COL_ID]);
        $user->setTagsLabel($row[self::COL_LABEL]);

        return $user;
    }

    public function objectToArray($user)
    {
        $data[self::COL_ID] = $user->getTagsId();
        $data[self::COL_LABEL] = $user->getTagsLabel();

        return $data;
    }
}

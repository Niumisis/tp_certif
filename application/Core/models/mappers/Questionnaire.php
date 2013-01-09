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
class Core_Model_Mapper_Questionnaire extends Core_Model_Mapper_Abstract
{
    protected $_dbTableClass = 'Core_Model_DbTable_Questionnaire';

    const COL_ID = 'questionnaire_id';
    const COL_NB = 'questionnaire_nb';
    const COL_TEMPS = 'questionnaire_temps';
    const COL_INTITULE = 'questionnaire_intitule';
    const COL_USER_ID = 'questionnaire_id_user';

    public function fetchAll()
    {
        $rowSet = $this->getDbTable()->fetchAll();
        if (0 === $rowSet->count()) {
            return false;
        }
        $questionnairerCollection = new Core_Model_QuestionnaireCollection();
        foreach ($rowSet as $row) {
            $questionnairerCollection->add($this->rowToObject($row));
        }

        return $questionnairerCollection;
    }

    public function rowToObject(Zend_Db_Table_Row_Abstract $row)
    {
        $user = new Core_Model_Questionnaire();
        $user->setQuestionnaireId($row[self::COL_ID]);
        $user->setQuestionnaireNb($row[self::COL_NB]);
        $user->setQuestionnaireTemps($row[self::COL_TEMPS]);
        $user->setQuestionnaireIntitule($row[self::COL_INTITULE]);
        $user->setQuestionnaireIdUser($row[self::COL_USER_ID]);

        return $user;
    }

    public function objectToArray($user)
    {
        $data[self::COL_ID] = $user->getQuestionnaireId();
        $data[self::COL_NB] = $user->getQuestionnaireNb();
        $data[self::COL_TEMPS] = $user->getQuestionnaireTemps();
        $data[self::COL_INTITULE] = $user->getQuestionnaireIntitule();
        $data[self::COL_USER_ID] = $user->getQuestionnaireIdUser();

        return $data;
    }
}

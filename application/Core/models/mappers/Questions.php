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
class Core_Model_Mapper_Questions extends Core_Model_Mapper_Abstract
{
    protected $_dbTableClass = 'Core_Model_DbTable_Questions';

    const COL_ID = 'id_questions';
    const COL_TYPE = 'type_questions';
    const COL_DATE = 'date_questions';
    const COL_INTITULE = 'intitule_questions';
    const COL_PRO_QUES1 = 'proposition_questions_1';
    const COL_PRO_QUES2 = 'proposition_questions_2';
    const COL_PRO_QUES3 = 'proposition_questions_3';
    const COL_PRO_QUES4 = 'proposition_questions_4';
    const COL_REPONSES = 'reponses_questions';
    const COL_IMG = 'image_url_questions';

    public function fetchAll()
    {
        $rowSet = $this->getDbTable()->fetchAll();
        if (0 === $rowSet->count()) {
            return false;
        }
      /*  $userCollection = new Core_Model_UserCollection();
        foreach ($rowSet as $row) {
            $userCollection->add($this->rowToObject($row));
        }*/

        return $rowSet;
    }

    public function rowToObject(Zend_Db_Table_Row_Abstract $row)
    {

        $user = new Core_Model_Questions();
        $user->setIdQuestions($row[self::COL_ID]);
        $user->setTypeQuestions($row[self::COL_TYPE]);
        $user->setDateQuestions($row[self::COL_DATE]);
        $user->setIntituleQuestions($row[self::COL_INTITULE]);
        $user->setPropositionQuestions1($row[self::COL_PRO_QUES1]);
        $user->setPropositionQuestions2($row[self::COL_PRO_QUES2]);
        $user->setPropositionQuestions3($row[self::COL_PRO_QUES3]);
        $user->setPropositionQuestions4($row[self::COL_PRO_QUES4]);
        $user->setReponsesQuestions($row[self::COL_REPONSES]);
        $user->setImageUrlQuestions($row[self::COL_IMG]);

        return $user;
    }

    public function objectToArray($user)
    {
        $data[self::COL_ID] = $user->getIdQuestions();
        $data[self::COL_TYPE] = $user->getTypeQuestions();
        $data[self::COL_DATE] = $user->getDateQuestions();
        $data[self::COL_INTITULE] = $user->getIntituleQuestions();
        $data[self::COL_PRO_QUES1] = $user->getPropositionQuestions1();
        $data[self::COL_PRO_QUES2] = $user->getPropositionQuestions2();
        $data[self::COL_PRO_QUES3] = $user->getPropositionQuestions3();
        $data[self::COL_PRO_QUES4] = $user->getPropositionQuestions4();
        $data[self::COL_REPONSES] = $user->getReponsesQuestions();
        $data[self::COL_IMG] = $user->getImageUrlQuestions();

        return $data;
    }
}

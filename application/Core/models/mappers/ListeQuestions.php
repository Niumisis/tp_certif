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
class Core_Model_Mapper_ListeQuestions extends Core_Model_Mapper_Abstract
{
    protected $_dbTableClass = 'Core_Model_DbTable_ListeQuestions';

    const COL_ID = 'lst_ques_id';
    const COL_QUESTION_ID = 'lst_ques_id_ques';
    const COL_QUESTIONNAIRE_ID = 'lst_ques_id_questionnaire';

    public function fetchAll($where = null)
    {
        $rowSet = $this->getDbTable()->fetchAll($where);
        if (0 === $rowSet->count()) {
            return false;
        }
        $listeQuestionsCollection = new Core_Model_ListeQuestionsCollection();
        foreach ($rowSet as $row) {
            $listeQuestionsCollection->add($this->rowToObject($row));
        }

        return $listeQuestionsCollection;
    }
    
    public function count($where = null)
    {
    	$rowSet = $this->getDbTable()->fetchAll($where);
   		return (int) $rowSet->count();
    }

    public function find($where = null)
    {
    	$rowSet = $this->getDbTable()->find($where);
    	if (0 === $rowSet->count()) {
    		return false;
    	}
    	$listeQuestionsCollection = new Core_Model_ListeQuestionsCollection();
    	foreach ($rowSet as $row) {
    		$listeQuestionsCollection->add($this->rowToObject($row));
    	}
    
    	return $listeQuestionsCollection;
    }
    
    public function rowToObject(Zend_Db_Table_Row_Abstract $row)
    {
        $user = new Core_Model_ListeQuestions();
        $user->setLstQuesId($row[self::COL_ID]);
        $user->setLstQuesIdQues($row[self::COL_QUESTION_ID]);
        $user->setLstQuesIdQuestionnaire($row[self::COL_QUESTIONNAIRE_ID]);

        return $user;
    }

    public function objectToArray($user)
    {
        $data[self::COL_ID] = $user->getLstQuesId();
        $data[self::COL_QUESTION_ID] = $user->getLstQuesIdQues();
        $data[self::COL_QUESTIONNAIRE_ID] = $user->getLstQuesIdQuestionnaire();

        return $data;
    }
}

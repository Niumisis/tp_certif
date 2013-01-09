<?php
/**
 * DbTable User
 *
 * Représente la table user de la BDD, selon le
 * design pattern DataTable Gateway
 *
 */

/**
 * DbTable User
 *
 * Représente la table user de la BDD, selon le
 * design pattern DataTable Gateway
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2013-01-07
 * @author Moi <moi@monmail.com>
 */
class Core_Model_DbTable_Questionnaire extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'tp_questionnaire';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'questionnaire_id';

    /* DECLARATION DES REFERENCES (FK) */
    protected $_referenceMap = array(
      /*  'FK_role' => array(
            'columns' => array('r_id'),
            'refcolumns' => array('r_id'),
            'refTableClass' => 'Core_Model_DbTable_Role',
            'onDelete' => self::RESTRICT,
            'onUpdate' => self::CASCADE
        )*/
    );
}

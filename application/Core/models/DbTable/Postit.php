<?php
/**
 * DbTable Postit
 *
 * Représente la table Postit2 de la BDD, selon le
 * design pattern DataTable Gateway
 *
 */

/**
 * DbTable Postit
 *
 * Représente la table Postit2 de la BDD, selon le
 * design pattern DataTable Gateway
 *
 *
 * @category MyApp
 * @package Core
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Core_Model_DbTable_Postit extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'postit2';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'pi_id';

    /* DECLARATION DES REFERENCES (FK) */
    protected $_referenceMap = array(
    		'FK_user_postit' => array(
    				'columns' => array('u_id'),
    				'refColumns' => array('u_id'),
    				'refTableClass' => 'Core_Model_DbTable_User',
    				'onDelete' => self::CASCADE,
    				'onUpdate' => self::CASCADE
    		)
    );
}








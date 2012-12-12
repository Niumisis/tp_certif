<?php
/**
 * DbTable Role
 *
 * Représente la table role de la BDD, selon le
 * design pattern DataTable Gateway
 *
 */

/**
 * DbTable Role
 *
 * Représente la table role de la BDD, selon le
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
class Core_Model_DbTable_Role extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'role';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'r_id';

    /* TABLE(S) DEPENDANTE(S) */
    protected $_dependentTables = array(
        'Core_Model_DbTable_User'
    );

}

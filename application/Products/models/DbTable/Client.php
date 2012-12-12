<?php
/**
 * DbTable Client
 *
 * Représente la table clients de la BDD, selon le
 * design pattern DataTable Gateway
 *
 */

/**
 * DbTable Client
 *
 * Représente la table clients de la BDD, selon le
 * design pattern DataTable Gateway
 *
 *
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_DbTable_Client extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'clients';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'client_id';

    /* TABLE(S) DEPENDANTE(S) */
    protected $_dependentTables = array(
        'Products_Model_DbTable_Commande'
    );

}

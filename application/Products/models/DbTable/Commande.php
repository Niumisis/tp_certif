<?php
/**
 * DbTable Commande
 *
 * Représente la table commandes de la BDD, selon le
 * design pattern DataTable Gateway
 *
 */

/**
 * DbTable Commande
 *
 * Représente la table commandes de la BDD, selon le
 * design pattern DataTable Gateway
 *
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_DbTable_Commande extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'commandes';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'commande_id';

    /* TABLE(S) DEPENDANTE(S) */
    protected $_dependentTables = array(
    		'Products_Model_DbTable_CommandeProduit'
    );
    
    
    /* DECLARATION DES REFERENCES (FK) */
    protected $_referenceMap = array(
        'commande_client_FK' => array(
            'columns' => array('commande_client_id'),
            'refcolumns' => array('client_id'),
            'refTableClass' => 'Products_Model_DbTable_Client',
            'onDelete' => self::SET_NULL,
            'onUpdate' => self::CASCADE
        ),
    	'commande_etat_FK' => array(
    				'columns' => array('commande_etat_id'),
    				'refcolumns' => array('commande_etat_id'),
    				'refTableClass' => 'Products_Model_DbTable_CommandeEtat',
    				'onDelete' => self::RESTRICT,
    				'onUpdate' => self::CASCADE
    		)
    );
}

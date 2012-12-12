<?php
/**
 * DbTable Produit
 *
 * Représente la table produits de la BDD, selon le
 * design pattern DataTable Gateway
 *
 */

/**
 * DbTable Produit
 *
 * Représente la table produits de la BDD, selon le
 * design pattern DataTable Gateway
 *
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_DbTable_Produit extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'produits';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'prod_id';

    /* TABLE(S) DEPENDANTE(S) */
    protected $_dependentTables = array(
    		'Products_Model_DbTable_CommandeProduit'
    );
    
    
    /* DECLARATION DES REFERENCES (FK) */
    protected $_referenceMap = array(
    		'produit_tva_FK' => array(
    				'columns' => array('prod_tva_id'),
    				'refcolumns' => array('tva_id'),
    				'refTableClass' => 'Products_Model_DbTable_Tva',
    				'onDelete' => self::RESTRICT,
    				'onUpdate' => self::CASCADE
    		),
    );
}

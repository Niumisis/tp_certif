<?php
/**
 * DbTable CommandeProduit
 *
 * Représente la table commandes_produits de la BDD, selon le
 * design pattern DataTable Gateway
 *
 */

/**
 * DbTable CommandeProduit
 *
 * Représente la table commandes_produits de la BDD, selon le
 * design pattern DataTable Gateway
 *
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_DbTable_CommandeProduit extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'commandes_produits';

    /* NOM DES CLES PRIMAIRES */
    protected $_primary = array('commande_id', 'produit_id');

    /* TABLE(S) DEPENDANTE(S) */
    protected $_dependentTables = array(
    	
    );
    
    
    /* DECLARATION DES REFERENCES (FK) */
    protected $_referenceMap = array(
    		'cp_commande_FK' => array(
    				'columns' => array('commande_id'),
    				'refcolumns' => array('commande_id'),
    				'refTableClass' => 'Products_Model_DbTable_Commande',
    				'onDelete' => self::CASCADE,
    				'onUpdate' => self::CASCADE
    		),
    		'cp_produit_FK' => array(
    				'columns' => array('produit_id'),
    				'refcolumns' => array('produit_id'),
    				'refTableClass' => 'Products_Model_DbTable_Produit',
    				'onDelete' => self::RESTRICT,
    				'onUpdate' => self::CASCADE
    		)
    );
}

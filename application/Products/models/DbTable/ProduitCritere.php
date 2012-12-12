<?php
/**
 * DbTable ProduitCritere
 *
 * Représente la table produits_criteres de la BDD, selon le
 * design pattern DataTable Gateway
 *
 */

/**
 * DbTable ProduitCritere
 *
 * Représente la table produits_criteres de la BDD, selon le
 * design pattern DataTable Gateway
 *
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_DbTable_ProduitCritere extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'produits_criteres';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'produits_criteres_id';

    /* TABLE(S) DEPENDANTE(S) */
    protected $_dependentTables = array(

    );
    
    /* DECLARATION DES REFERENCES (FK) */
    protected $_referenceMap = array(
    		'critere_produit_FK' => array(
    				'columns' => array('produit_id'),
    				'refcolumns' => array('produit_id'),
    				'refTableClass' => 'Products_Model_DbTable_Produit',
    				'onDelete' => self::CASCADE,
    				'onUpdate' => self::CASCADE
    		),
    );
}

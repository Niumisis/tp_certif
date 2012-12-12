<?php
/**
 * DbTable Tva
 *
 * Représente la table tva de la BDD, selon le
 * design pattern DataTable Gateway
 *
 */

/**
 * DbTable Tva
 *
 * Représente la table tva de la BDD, selon le
 * design pattern DataTable Gateway
 *
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_DbTable_Tva extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'tva';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'tva_id';

    /* TABLE(S) DEPENDANTE(S) */
    protected $_dependentTables = array(
    		'Products_Model_DbTable_Produit'
    );
    
    
    /* DECLARATION DES REFERENCES (FK) */
    protected $_referenceMap = array(

    );
}

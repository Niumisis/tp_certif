<?php
/**
 * DbTable CommandeEtat
 *
 * Représente la table commandes_etat de la BDD, selon le
 * design pattern DataTable Gateway
 *
 */

/**
 * DbTable CommandeEtat
 *
 * Représente la table commandes_etat de la BDD, selon le
 * design pattern DataTable Gateway
 *
 * @category MyApp
 * @package Products
 * @subpackage Model
 * @version 0.01
 * @since 2012-08-06
 * @author Moi <moi@monmail.com>
 */
class Products_Model_DbTable_CommandeEtat extends Zend_Db_Table_Abstract
{
    /* NOM DE LA TABLE */
    protected $_name = 'commandes_etat';

    /* NOM DE LA CLE PRIMAIRE */
    protected $_primary = 'commande_etat_id';

    /* TABLE(S) DEPENDANTE(S) */
    protected $_dependentTables = array(
    		'Products_Model_DbTable_Commande'
    );
    
    
    /* DECLARATION DES REFERENCES (FK) */
    protected $_referenceMap = array(
     
    );
}

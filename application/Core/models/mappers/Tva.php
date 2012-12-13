<?php

class Products_Model_Mapper_Tva extends Core_Model_Mapper_Abstract
{
    protected $_dbTableClass = 'Products_Model_DbTable_Tva';

    const COL_ID = 'tva_id';
    const COL_TAUX = 'tva_taux';


  
    public function rowToObject(Zend_Db_Table_Row_Abstract $row)
    {

        $tva = new Products_Model_Tva();
        $tva->setId($row[self::COL_ID]);   
        $tva->setCivilite($row[self::COL_TAUX]);

    
        return $tva;
    }

    public function objectToArray($tva)
    {
        $data[self::COL_ID] = $tva->getId();
        $data[self::COL_TAUX] = $tva->getTaux();

        return $data;
    }
    
 
}
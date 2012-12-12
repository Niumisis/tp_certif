<?php
/**
 * DbTable pour l'objet WidgetPostit du module ZF  'Core'
 *
 * @category   Application
 * @package    Application_Core
 * @subpackage DbTable
 * @desc       DbTable pour l'objet WidgetPostit du module ZF  'Core'
 * @author     Jean-Baptiste MONIN   <jb.monin@cleo-consulting.fr>
 * @copyright  2012 CLEO CONSULTING
 * @version    0.1
 * @since      2012-09-10
 */
class Core_Model_DbTable_WidgetPostit extends Zend_Db_Table_Abstract
{
    protected $_name = Core_Model_Mapper_WidgetPostit::TABLE_NAME;

    protected $_primary = Core_Model_Mapper_WidgetPostit::COL_ID;

    protected $_dependentTables = array();
                    
    protected $_referenceMap = array(
        'FK_POSTIT_USER' => array(
            'columns'         => array(Core_Model_Mapper_WidgetPostit::COL_USER_ID),
            'refTableClass'   => 'Core_Model_DbTable_User',
            'refColumns'      => array(Core_Model_Mapper_User::COL_ID),
            'onDelete'        => self::CASCADE,
            'onUpdate'        => self::CASCADE
        )
    );
}
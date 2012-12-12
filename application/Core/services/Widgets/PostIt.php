<?php
/**
 * MODULE CORE // SERVICE WIDGET / POST IT
 *
 * Ce fichier contient une unique classe : Core_Service_Widgets_PostIt
 *
 */

/**
 * Couche service pour la gestion des postits
 *
 * Implémente les fonctionnalités suivantes pour les postits :
 * <ul>
 * <li>POST-IT
 *   <ul>
 *     <li>Enregistrement d'un post-it</li>
 *     <li>Suppression d'un post-it</li>
 *   </ul>
 * </li>
 * </ul>
 * 
 * @category   Application
 * @package    Application_Core
 * @subpackage Service
 * @desc       Classe de type service pour la gestion des Post-It
 * @author     Jean-Baptiste MONIN   <jb.monin@cleo-consulting.fr>
 * @copyright  2012 CLEO CONSULTING
 * @versioni   0.1
 * @since      2012-09-11
 *
 */
class Core_Service_Widgets_PostIt
{

    /**
     * Permet l'enregistrement d'un post-it
     * @param $postit Core_Model_WidgetPostit
     * @return boolean
     */
    public function save(Core_Model_WidgetPostit $postit)
    {
         $mapper = new Core_Model_Mapper_WidgetPostit();
         $saved = $mapper->save($postit);
    }
    
    /**
     * Permet la suppression d'un post-it
     * @param $postItId integer|Core_Model_WidgetPostit
     * @return boolean
     */
    public function delete($postit)
    {
        $mapper = new Core_Model_Mapper_WidgetPostit();
        if (is_int($postit)) {
            $postit = $mapper->find($postit);
        }
        if (!$postit instanceof Core_Model_WidgetPostit) {
            throw new DomainException("core_widget_postit_exception_entry_not_found");
        }
        return $mapper->delete($postit);
    }
    
    /**
     * Permet l'obtention du nopmbre des POST-ITs d'un utilisateur
     * @param $userid
     * @return int
     */
    public function countForUser($userId)
    {
        if (0 === (int) $userId)
            throw new DomainException("core_widget_postit_exception_count_invalid_userid");
            
        $mapper = new Core_Model_Mapper_WidgetPostit();
        return count($mapper->fetchAllByUserId($userId));
    }
    
    /**
     * Permet l'obtention de la liste des POST-ITs d'un utilisateur
     * @param $userid
     * @return array
     */
    public function fetchForUser($userId)
    {
        if (0 === (int) $userId)
            throw new DomainException("core_widget_postit_exception_list_invalid_userid");
        
        $mapper = new Core_Model_Mapper_WidgetPostit();
        return $mapper->fetchAllByUserId($userId);
    }
}
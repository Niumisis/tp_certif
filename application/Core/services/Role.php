<?php
/**
 * Couche service pour les traitements liés
 * à la gestion des rôles
 *
 * Couche service pour les traitements liés
 * à la gestion des rôles : <br />
 * <ul>
 * <li>CRUD de haut niveau sur les rôles</li>
 * </ul>
 *
 */

/**
 * Couche service pour les traitements liés
 * à la gestion des rôles
 *
 * Couche service pour les traitements liés
 * à la gestion des rôles : <br />
 * <ul>
 * <li>CRUD de haut niveau sur les rôles</li>
 * </ul>
 *
 * @category MyApp
 * @package Core
 * @subpackage Service
 * @example <br />
 *          Instanciation : <br />
 *          <b>$roleService = new Core_Service_Role();</b>
 * @version 0.01
 * @since 2012-08-08
 * @author Moi <moi@monmail.com>
 */
class Core_Service_Role extends My_Service_ServiceAbstract
{
    /**
     * Le mapper role assure le lien avec la persistence des données
     * concernant les rôles en base de données
     *
     * @var Core_Model_Mapper_Role
     */
    private $roleMapper;

    /**
     * Récupère un rôle en base de données à partir
     * de son ID
     *
     * @param int $rid
     *            L'id (clé primaire) du rôle
     * @return Core_Model_Role boolean
     */
    public function find($rid)
    {
       
        return $this->getRoleMapper()->find($rid);
    }

    /**
     * Récupère, depuis la BDD,
     * la liste des rôles sous forme
     * d'un tableau d'objets Core_Model_Role
     *
     * @return array
     */
    public function fetchAll()
    {
      return $this->getRoleMapper()->fetchAll();
    }

    /**
     * Permet d'enregistrer un objet rôle
     * dans la BDD
     *
     * @param  Core_Model_Role $role
     * @return boolean
     */
    public function save($role)
    {
        return (bool) $this->getRoleMapper()->save($role);
    }

    /**
     * Permet de supprimer un objet rôle
     * dans la BDD
     *
     * @param  Core_Model_Role $role
     * @return boolean
     */
    public function delete($role)
    {
        return $this->getRoleMapper()->delete($role);
    }

    /**
     * INJECTED FACTORY
     * Permet d'accéder, en lazy loading, au mapper de données
     * des rôles
     *
     * @return Core_Model_Mapper_Role
     */
    public function getRoleMapper()
    {
        
        if (null === $this->roleMapper) {
            $this->roleMapper = new Core_Model_Mapper_Role();
        }

        return $this->roleMapper;
    }

    /**
     * Point d'injection pour le mapper de données des rôles
     *
     * @param Core_Model_Mapper_Role $mapper
     */
    public function setRoleMapper($mapper)
    {
        $this->roleMapper = $mapper;
    }
}
 
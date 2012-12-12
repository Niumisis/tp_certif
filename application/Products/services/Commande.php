<?php

/**
 * Couche service pour les traitements liés
 * à la gestion des commandes : <br />
 *
 */

/**
 * Couche service pour les traitements liés
 * à la gestion des commandes : <br />
 * <ul>
 * <li>find</li>
 * <li>fetchall</li>
 * <li>save</li>
 * <li>delete</li>
 * </ul>
 *
 * @category MyApp
 * @package Products
 * @subpackage Service
 * @example <br />
 *          Instanciation : <br />
 *          <b>$userService = new Products_Service_Produits();</b>
 * @version 0.01
 * @since 2012-10-09
 * @author Moi <moi@monmail.com>
 */
class Products_Service_Commande extends My_Service_ServiceAbstract
{
    /**
     * Le mapper user assure le lien avec la persistence des données
     * utilisateur en base de données
     *
     * @var Core_Model_Mapper_User
     */
  	private $_commandeService;


    public function find($id)
    {
        return $this->getCommandeMapper()->find($id);
    }

    /**
     * Récupère, depuis le cache de données ou la BDD,
     * la liste des utilisateurs sous forme
     * d'un tableau d'objets Core_Model_User
     *
     * @return Core_Model_UserCollection
     */
    public function fetchAll()
    {
        if (! $produits = $this->getCache()->load('commandeservicefetchall')) {
            $produits = $this->getCommandeMapper()->fetchAll();
            $this->getCache()->save($produits);
        }

        return $produits;
    }

    /**
     * Permet d'enregistrer un objet utilisateur
     * dans la BDD
     *
     * @param  Core_Model_User $user
     * @return boolean
     */
    public function save(Products_Model_Produit $user)
    {
        $result = (bool) $this->getCommandeMapper()->save($user);
        if ($result) {
            $this->getCache()->remove('commandeservicefetchall');
        }
        return $result;
    }

    /**
     * Permet de supprimer un objet utilisateur
     * dans la BDD
     *
     * @param  Core_Model_User $user
     * @return boolean
     */
    public function delete($user)
    {
        $result = (bool) $this->getCommandeMapper()->delete($user);
        if ($result) {
            $this->getCache()->remove('commandeservicefetchall');
        }
        return $result;
    }

    /**
     * INJECTED FACTORY
     * Permet d'accéder, en lazy loading, au mapper de données
     * des produits
     *
     * @return Products_Model_Mapper_Produits
     */
    public function getCommandeMapper()
    {
        if (null === $this->_commandeService) {
            $this->_commandeService = new Products_Model_Mapper_Commande();
        }

        return $this->_commandeService;
    }

    /**
     * Point d'injection pour le mapper de données des produits
     *
     * @param Products_Model_Mapper_Produits $mapper
     */
    public function setCommandeMapper($mapper)
    {
        $this->_commandeService = $mapper;
    }
    
   
}
 
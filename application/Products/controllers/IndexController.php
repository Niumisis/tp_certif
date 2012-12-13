<?php
/**
 * Controller par défaut du module Products
 *
 */

/**
 * Controller par défaut du module Products
 *
 * @category MyApp
 * @package Products
 * @subpackage Controller
 * @version 0.01
 * @since 2012-10-08
 * @author Moi <moi@monmail.com>
 */
class Products_IndexController extends Zend_Controller_Action
{
    public function indexAction()
    {
			$productMapper = new Products_Model_Mapper_Produit();
			$this->view->produits = $productMapper->fetchAll();
    }
    
    public function listcmdAction()
    {
    	$productMapper = new Products_Model_Mapper_Commande();
    	$this->view->commandes = $productMapper->fetchAll();
    }
    
    public function newAction()
    {
		$form = new Products_Form_Productadd();
        $form->setAction(null)
             ->setMethod('post');
             
        if( $this->getRequest()->isPost()) {
           
            if ($form->isValid($this->getRequest()->getPost())) {
            	
            	$produit = new Products_Model_Produit();
            	$produit->setProdReference($form->getValue('ref'))
            			->setProdDesignation($form->getValue('label'))
            			->setProdDescription($form->getValue('description'))
            			->setProdPrix(($form->getValue('prixht') * 100))
            			->setProdStock($form->getValue('stock'))
            			->setProdTvaId($form->getValue('tva'))
            			;
            	
            	$produitService = new Products_Service_Produit();
            	
                try {
                    $valide = $produitService->save($produit);
                    
                } catch(Exception $e) {
                    $valide = false;
                    $this->view->error = true;
                }
                
                if(!$valide) {
                    $this->view->error = true;
                    $this->view->errorMessage = 'Le produit n\'a pas été enregistré';
                } else {
                    $this->_redirect($this->view->url(array(), 'productsIndexindex'));
                }
                
            }
        }
        
        $this->view->form = $form;
    }
    
    
    
    public function newcmdAction()
    {
    	$produitService = new Products_Service_Produit();
    	$this->view->produits = $produitService->fetchall();

    	$form = new Products_Form_Commandeadd();
    	$form	->setAction(null)
    			->setMethod('post');
    
    	if( $this->getRequest()->isPost()) {
    		if ($form->isValid($this->getRequest()->getPost())) {
    			 
    			// Initialisation de la commande
    			$commande = new Products_Model_Commande();
    			$commandeMapper = new Products_Model_Mapper_Commande();
    			$commande->setCommandeClientId($form->getValue('clients'));
    			$commande->setCommandeRef($form->getValue('ref'));
    			$commande->setCommandeEtatId(1);
    			$commandeId = $commandeMapper->save($commande);
    			$commande = $commandeMapper->find($commandeId);
    			
    			// Ajout des produits à la commande
    			$produitsService = new Products_Service_Produit();
    			$produits = $produitsService->fetchAll();
	
    			$montantHt = 0;
    			$montantTtc = 0;
    			
    			foreach($produits as $produit) {
    				// filtre les produits commandé
    				if ($form->getElement('prodId_'.$produit->getprodId())->getValue() == 1) {
    					$commandeProduit = new Products_Model_CommandeProduit();
    					$commandeProduitMapper = new Products_Model_Mapper_CommandeProduit();
    					$commandeProduit->setCommandeId($commandeId);
    					$commandeProduit->setProduitId($produit->getprodId());
    					$commandeProduit->setCommandesProduitsPrixHt($produit->getProdPrix() * 100);
    					$commandeProduit->setCommandesProduitsTva($produit->getTva()->getTvaTaux());
    					
    					// reglage qte a faire (mise en forme necessaire afin de pouvoir mettre un input pour choisir la qte)
    					$commandeProduit->setCommandesProduitsQuantite(4);
    					$commandeProduitMapper->save($commandeProduit);
    					
    					
    					// Calcul les totaux
    					$qte = $commandeProduit->getCommandesProduitsQuantite();
    					$prixUnitaireHt = $commandeProduit->getCommandesProduitsPrixHt();
    					$tva = $commandeProduit->getCommandesProduitsTva();
    					$montantHt += $qte *  $prixUnitaireHt;
    					$montantTtc +=  ($montantHt * (1 + $tva / 10000));
    				}
    			}

    			 
    			$commande = $commandeMapper->find($commandeId);
    			$commande->setCommandeId($commandeId);
    			$commande->setCommandeMontantHt($montantHt);
    			$commande->setCommandeMontantTtc($montantTtc);
    			$commande->setCommandeReglement($form->getValue('paye'));
    			$commandeMapper->save($commande);
    			
    		}
    		
    		
    		
    		
    		
   /* 		
    		$produitService = new Products_Service_Produit();
    		 
    		try {
    			$valide = $produitService->save($produit);
    		
    		} catch(Exception $e) {
    			$valide = false;
    			$this->view->error = true;
    		}
    		
    		if(!$valide) {
    			$this->view->error = true;
    			$this->view->errorMessage = 'Le produit n\'a pas été enregistré';
    		} else {
    			$this->_redirect($this->view->url(array(), 'productsIndexindex'));
    		}
    		*/
    		
    	}

    	$this->view->form = $form;
    }
    
    public function genAction()
    {
    	
    }

}

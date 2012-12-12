<?php

class Core_Service_Postit extends My_Service_ServiceAbstract
{
    /**
     *
     * @var Core_Model_Mapper_Postit
     */
    private $postitMapper;
    
    public function __construct()
    {
    	$this->postitMapper = new Core_Model_Mapper_Postit();
    }
    
    public function add($libelle)
    {
    	$user = Zend_Auth::getInstance()->getIdentity();
    	
    	
    	$postit = new Core_Model_Postit();
    	$postit->setLibelle($libelle)
    		   ->setUserId($user->getId());
    	
    	$this->postitMapper->save($postit);
    }
    
    public function load()
    {
    	$user = Zend_Auth::getInstance()->getIdentity();

    	$postits = $this->postitMapper->fetchAll($user->getId());
    	
    	if (!$postits) {
    		return false;
    	} else {
    		return $postits->toArray();    		
    	}
    }
    
    public function delete($postitId)
    {
    	$postit = $this->postitMapper->find($postitId);
    	if (!$postit) {
    		return false;
    	} else {
    		return $this->postitMapper->delete($postit);
    	}
    }
    
    public function count()
    {
    	return count($this->load());
    }
    
	/**
	 * @return the $roleMapper
	 */
	public function getRoleMapper() {
		return $this->roleMapper;
	}

	/**
	 * @param Core_Model_Mapper_Postit $roleMapper
	 */
	public function setRoleMapper($roleMapper) {
		$this->roleMapper = $roleMapper;
	}


}
 
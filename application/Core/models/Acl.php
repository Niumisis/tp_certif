<?php

class Core_Model_Acl implements Core_Model_Interface
{
	private $id;
	private $rights;
	
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	
	public function setRights($rights)
	{
		$this->rights = $rights;
		return $this;
	}
	
	public function getId()
	{
		return $this->id;
	}
	
	public function getRights()
	{
		return $this->rights;
	}
}
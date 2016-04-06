<?php

class Application_Service_Contact
{
    protected $mapper;
    
    public function __construct() {
        $this->mapper = new Application_Model_Mapper_Contact();
    }
    
    public function findAll() {
        return $this->mapper->findAll();
    }
}

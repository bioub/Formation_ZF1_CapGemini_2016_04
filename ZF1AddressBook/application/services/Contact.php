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
    
    public function findById($id) {
        return $this->mapper->findById($id);
    }
    
    public function delete($id) {
        return $this->mapper->delete($id);
    }
}

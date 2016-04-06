<?php

class Application_Model_Mapper_Contact
{
    protected $gateway;
    
    public function __construct() {
        $this->gateway = new Application_Model_DbTable_Contact();
    }
    
    public function findAll()
    {
        $rowset = $this->gateway->fetchAll();
        $result = [];
        
        foreach ($rowset as $row) {
            $entity = new Application_Model_Contact();
            $entity->setId($row['id'])
                   ->setPrenom($row['prenom'])
                   ->setNom($row['nom'])
                   ->setEmail($row['email'])
                   ->setTelephone($row['telephone']);
            
            $result[] = $entity;
        }
        
        return $result;
    }
}

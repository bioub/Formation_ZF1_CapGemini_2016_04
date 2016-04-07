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
    
    public function findById($id)
    {
//        $rowset = $this->gateway->fetchRow(['id' => $id]);
        $rowset = $this->gateway->find($id);
        
        $row = $rowset->current();
        
        if (!$row) {
            return null;
        }
        
        $entity = new Application_Model_Contact();
        $entity->setId($row['id'])
               ->setPrenom($row['prenom'])
               ->setNom($row['nom'])
               ->setEmail($row['email'])
               ->setTelephone($row['telephone']);
        
        return $entity;
    }
    
    public function delete($id)
    {
        return $this->gateway->delete(array('id = ?' => $id));
    }
    
    public function insert(Application_Model_Contact $entity)
    {
       $data = [];
       $data['prenom'] = $entity->getPrenom();
       $data['nom'] = $entity->getNom();
       $data['email'] = $entity->getEmail();
       $data['telephone'] = $entity->getTelephone();
       
       $id = $this->gateway->insert($data);
       
       $entity->setId($id);
    }
}

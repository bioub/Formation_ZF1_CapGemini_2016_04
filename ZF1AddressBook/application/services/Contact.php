<?php

class Application_Service_Contact
{
    protected $mapper;
    protected $form;
    
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
    
    public function getForm()
    {
        if (!$this->form) {
            $this->form = new Application_Form_Contact();
        }
        
        return $this->form;
    }
    
    public function insert($data)
    {
        if (!$this->form->isValid($data)) {
            return null;
        }
        
        // Récupère les données filtrées par le formulaire
        $data = $this->form->getValues();
        
        $entity = new Application_Model_Contact();
        $entity->setPrenom($data['prenom'])
               ->setNom($data['nom'])
               ->setEmail($data['email'])
               ->setTelephone($data['telephone']);
        
        $this->mapper->insert($entity);
        
        return $entity;
    }
}

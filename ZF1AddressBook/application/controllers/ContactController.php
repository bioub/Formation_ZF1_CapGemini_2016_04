<?php

class ContactController extends Zend_Controller_Action
{
    protected $contactService;

    public function init()
    {
        /* Initialize action controller here */
        $this->contactService = new Application_Service_Contact();
    }

    // /contact/index ou /contact (index valeur par défaut)
    public function indexAction()
    {
        $this->view->contacts = $this->contactService->findAll();
    }

    // /contact/show
    public function showAction()
    {
        $id = $this->getParam('id');
        
        // Exercice
        // Ecrire la méthode findById($id) (retourne Application_Model_Contact) dans le service
        // Ecrire la méthode findById($id) dans le mapper
        // Transmettre l'objet à la vue
        // Ecrire la vue
    }
    
    // /contact/list-by-company
    public function listByCompanyAction()
    {
        // action body
    }
}


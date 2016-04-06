<?php

class ContactController extends Zend_Controller_Action
{
    protected $contactService;
    
    /**
     *
     * @var Zend_Controller_Request_Http
     */
    protected $_request;
    
    /**
     * Redirector - défini pour l'auto-complétion
     *
     * @var Zend_Controller_Action_Helper_Redirector
     */
    protected $_redirector = null;
    
    /**
     *
     * @var Zend_Controller_Action_Helper_FlashMessenger
     */
    protected $_flashMessenger = null;

    public function init()
    {
        $this->_redirector = $this->_helper->getHelper('Redirector');
        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
        /* Initialize action controller here */
        $this->contactService = new Application_Service_Contact();
    }

    // /contact/index ou /contact (index valeur par défaut)
    public function indexAction()
    {
        $this->view->contacts = $this->contactService->findAll();
        $this->view->successMessages = $this->_flashMessenger->getMessages('success');
    }

    // /contact/show
    public function showAction()
    {
        $id = $this->getParam('id');
        
        $contact = $this->contactService->findById($id);
        
        if (!$contact) {
            throw new Zend_Controller_Action_Exception('Contact inexistant', 404);
        }
        
        $this->view->contact = $contact;
    }
    
    public function deleteAction() 
    {
        if ($this->_request->isPost()) {
            
            if ($this->_request->getPost('confirm') === 'oui') {
                $id = $this->getParam('id');
                $this->contactService->delete($id);
                $this->_flashMessenger
                        ->addMessage('Le contact a bien été supprimé', 'success');
            }
            
            $urlOptions = ['controller' => 'contact', 'action' => 'index'];
            $this->_redirector->gotoRouteAndExit($urlOptions, null, true);
        }
        
        $this->showAction();
    }
    
    public function addAction()
    {
        
    }
    
    // /contact/list-by-company
    public function listByCompanyAction()
    {
        // action body
    }
}


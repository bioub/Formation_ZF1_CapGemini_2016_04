<?php

namespace Application\Controller;

use Application\Service\ContactService;
use Zend\Http\Request;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ContactController extends AbstractActionController
{
    /**
     *
     * @var ContactService 
     */
    protected $contactService;
    
    /**
     *
     * @var Request
     */
    protected $request;
    
    public function __construct(ContactService $contactService) {
        $this->contactService = $contactService;
    }
    
//    public function init()
//    {
//        $this->_redirector = $this->_helper->getHelper('Redirector');
//        $this->_flashMessenger = $this->_helper->getHelper('FlashMessenger');
//        /* Initialize action controller here */
//        $this->contactService = Zend_Registry::get('contactService');
//    }

    // /contact/index ou /contact (index valeur par défaut)
    public function indexAction()
    {
        return new ViewModel([
            'contacts' => $this->contactService->findAll()
        ]);
    }

//    // /contact/show
//    public function showAction()
//    {
//        $id = $this->getParam('id');
//        
//        $contact = $this->contactService->findById($id);
//        
//        if (!$contact) {
//            throw new Zend_Controller_Action_Exception('Contact inexistant', 404);
//        }
//        
//        $this->view->contact = $contact;
//    }
//    
//    public function deleteAction() 
//    {
//        if ($this->_request->isPost()) {
//            
//            if ($this->_request->getPost('confirm') === 'oui') {
//                $id = $this->getParam('id');
//                $this->contactService->delete($id);
//                $this->_flashMessenger
//                        ->addMessage('Le contact a bien été supprimé', 'success');
//            }
//            
//            $urlOptions = ['controller' => 'contact', 'action' => 'index'];
//            $this->_redirector->gotoRouteAndExit($urlOptions, null, true);
//        }
//        
//        $this->showAction();
//    }
//    
//    public function addAction()
//    {
//        $form = $this->contactService->getForm();
//        
//        if ($this->_request->isPost()) {
//            
//            $contact = $this->contactService->insert($this->_request->getPost());
//            
//            if ($contact) {
//                $urlOptions = ['controller' => 'contact', 'action' => 'show',
//                               'id' => $contact->getId()];
//                $this->_redirector->gotoRouteAndExit($urlOptions, null, true);
//            }
//        }
//        
//        $this->view->contactForm = $form;
//    }
//    
//    // /contact/list-by-company
//    public function listByCompanyAction()
//    {
//        // action body
//    }
}


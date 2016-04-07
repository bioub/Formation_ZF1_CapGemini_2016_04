<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ApplicationTest\Controller;

use Application\Entity\Contact;
use Application\Service\ContactService;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

/**
 * Description of ContactControllerTest
 *
 * @author Administrateur
 */
class ContactControllerTest extends AbstractHttpControllerTestCase
{
    protected function setUp() {
         $this->setApplicationConfig(
             include 'config/application.config.php'
         );
         parent::setUp();
    }
    
    public function testIndexActionIsAccessible()
    {
        $this->dispatch('/contact');
        $this->assertResponseStatusCode(200);
        $this->assertControllerName('application\controller\contact');
        $this->assertActionName('index');
    }
    
    public function testIndexActionContent()
    {
        $this->dispatch('/contact');
        $this->assertQueryCount('table.table > tr', 1);
    }
    
    public function testIndexActionContentWithMock()
    {
        $retour = [
            (new Contact)->setId(1)->setPrenom('A')->setNom('B'),
            (new Contact)->setId(1)->setPrenom('B')->setNom('C'),
        ];
        
        $mock = $this->prophesize(ContactService::class);
        $mock->findAll()->willReturn($retour)->shouldBeCalled();
        
        $serviceManager = $this->getApplication()->getServiceManager();
        $serviceManager->setAllowOverride(true);
        
        $serviceManager->setService('Application\Service\Contact', $mock->reveal());
        
        $this->dispatch('/contact');
        echo($this->getApplication()->getResponse());
        $this->assertQueryCount('table.table > tr', 2);
    }
    

//    public function testIndexActionContentWithMock()
//    {
//        $mock = $this->getMockBuilder('Application_Service_Contact')
//                        ->disableOriginalConstructor()
//                        ->getMock();
//        
//        $retour = [
//            (new Application_Model_Contact)->setId(1)->setPrenom('A')->setNom('B'),
//            (new Application_Model_Contact)->setId(1)->setPrenom('B')->setNom('C'),
//        ];
//        
//        $mock->expects($this->exactly(1))
//                ->method('findAll')
//                ->willReturn($retour);
//        
//        Zend_Registry::set('contactService', $mock);
//        
//        $this->dispatch('/contact');
//        $this->assertQueryCount('table.table > tr', 2);
//    }
}

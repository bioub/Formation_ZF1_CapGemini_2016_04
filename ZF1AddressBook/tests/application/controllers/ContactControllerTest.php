<?php

class ContactControllerTest extends Zend_Test_PHPUnit_ControllerTestCase
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testIndexActionIsAccessible()
    {
        $this->dispatch('/contact');
        $this->assertResponseCode(200);
        $this->assertController('contact');
        $this->assertAction('index');
    }
    
    public function testIndexActionContent()
    {
        $this->dispatch('/contact');
        $this->assertQueryCount('table.table > tr', 1);
    }

    public function testIndexActionContentWithMock()
    {
        $mock = $this->getMockBuilder('Application_Service_Contact')
                        ->disableOriginalConstructor()
                        ->getMock();
        
        $retour = [
            (new Application_Model_Contact)->setId(1)->setPrenom('A')->setNom('B'),
            (new Application_Model_Contact)->setId(1)->setPrenom('B')->setNom('C'),
        ];
        
        $mock->expects($this->exactly(1))
                ->method('findAll')
                ->willReturn($retour);
        
        Zend_Registry::set('contactService', $mock);
        
        $this->dispatch('/contact');
        $this->assertQueryCount('table.table > tr', 2);
    }
}


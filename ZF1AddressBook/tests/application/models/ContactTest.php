<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ContactTest
 *
 * @author Administrateur
 */
require_once __DIR__ . '/../../../application/models/Contact.php';

class Application_Model_ContactTest extends PHPUnit_Framework_TestCase
{
    protected function setUp()
    {
        $this->contact = new Application_Model_Contact();
    }
    
    public function testInitialValues()
    {
        $this->assertNull($this->contact->getId());
        $this->assertNull($this->contact->getPrenom());
        $this->assertNull($this->contact->getNom());
        $this->assertNull($this->contact->getEmail());
        $this->assertNull($this->contact->getTelephone());
    }
    
    public function testGetSetPrenom()
    {
        $this->contact->setPrenom('Romain');
        $this->assertEquals($this->contact->getPrenom(), 'Romain');
    }
}

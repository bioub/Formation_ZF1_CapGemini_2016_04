<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Application\Mapper;

use Application\Entity\Contact;
use Zend\Db\TableGateway\TableGateway;
use Zend\Stdlib\Hydrator\ClassMethods;

/**
 * Description of ContactMapper
 *
 * @author Administrateur
 */
class ContactMapper {
    /**
     *
     * @var TableGateway
     */
    protected $gateway;
    
    public function __construct(TableGateway $gateway) {
        $this->gateway = $gateway;
    }

    
    public function findAll()
    {
        $rowset = $this->gateway->select();
        $result = [];
        
        foreach ($rowset as $row) {
            $entity = new Contact();
            $hydrator = new ClassMethods();
            $hydrator->hydrate((array) $row, $entity);
            
            $result[] = $entity;
        }
        
        return $result;
    }
}

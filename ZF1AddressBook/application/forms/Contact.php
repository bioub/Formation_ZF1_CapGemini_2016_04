<?php

class Application_Form_Contact extends Zend_Form
{

    public function init()
    {
        /* Form Elements & Other Definitions Here ... */
        
        // -- Prénom --
        $element = new Zend_Form_Element_Text('prenom');
        $element->setLabel('Prénom');
        $element->setRequired();
        
        $validator = new Zend_Validate_StringLength();
        $validator->setMax(40);
        $element->addValidator($validator);
        
        $this->addElement($element);
        // -- Fin Prénom --
        
        // -- Nom --
        $element = new Zend_Form_Element_Text('nom');
        $element->setLabel('Nom');
        $element->setRequired();
        
        $validator = new Zend_Validate_StringLength();
        $validator->setMax(40);
        $element->addValidator($validator);
        
        $filter = new Zend_Filter_StringToUpper();
        $element->addFilter($filter);
        
        $filter = new Zend_Filter_StripTags();
        $element->addFilter($filter);
        
        $filter = new Zend_Filter_StringTrim();
        $element->addFilter($filter);
        
        $this->addElement($element);
        // -- Fin Nom --
        
        $element = new Zend_Form_Element_Text('email');
        $element->setLabel('Email');
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('telephone');
        $element->setLabel('Téléphone');
        $this->addElement($element);
    }


}


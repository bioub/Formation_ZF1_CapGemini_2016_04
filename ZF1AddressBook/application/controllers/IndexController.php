<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $date = date('d/m/Y H:i:s');
        
        $this->view->dateNow = $date;
    }


}


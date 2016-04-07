<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initZFDebug() {
        $autoloader = Zend_Loader_Autoloader::getInstance();
        $autoloader->registerNamespace('ZFDebug');
        
        $resource = $this->getPluginResource('db');
        $db = $resource->getDbAdapter();

        $options = array(
            'plugins' => array('Variables',
                'Database' => array('adapter' => $db),
                'File' => array('basePath' => dirname(__DIR__)),
                'Exception')
        );
        $debug = new ZFDebug_Controller_Plugin_Debug($options);

        $this->bootstrap('frontController');
        $frontController = $this->getResource('frontController');
        $frontController->registerPlugin($debug);
    }

    public function _initRegistry()
    {
        $contactService = new Application_Service_Contact();
        Zend_Registry::set('contactService', $contactService);
    }
}

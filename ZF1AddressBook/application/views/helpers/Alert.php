<?php

class Zend_View_Helper_Alert extends Zend_View_Helper_Abstract
{
    public function alert($message, $type = 'success')
    {
       // Zend_Controller_Front::getInstance();
        
        // Syntaxe HEREDOC (équivalent de "Message $variable")
        $html = <<<HTML
<div class="alert alert-$type alert-dismissible" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  $message
</div>       
HTML;
        
        return $html; 
    }
}

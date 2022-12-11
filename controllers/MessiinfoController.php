<?php
require_once "RonaldoController.php";

class MessiinfoController extends MessiController {
    public $template = "infoMessi.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        

        return $context;
    }
}
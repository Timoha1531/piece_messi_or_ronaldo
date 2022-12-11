<?php
require_once "RonaldoController.php";

class RonaldoinfoController extends RonaldoController {
    public $template = "infoRonaldo.twig";
    
    public function getContext(): array
    {
        $context = parent::getContext(); 

        

        return $context;
    }
}
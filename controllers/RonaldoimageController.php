<?php
require_once "RonaldoController.php"; // импортим TwigBaseController

class RonaldoimageController extends RonaldoController {
    public $template="imageObject.twig";
    public function getContext() : array
    {
    
        $context = parent::getContext(); // вызываем родительский метод
        $context['url_image']="/image/imageRonaldo.jpg";
        $context['is_image']="/Ronaldo/image";
        return $context;
    }
}
<?php
require_once "RonaldoController.php"; // импортим TwigBaseController

class MessiimageController extends MessiController {
    public $template="imageObject.twig";
    public function getContext() : array
    {
    
        $context = parent::getContext(); // вызываем родительский метод
        $context['url_image']="/image/imageMessi.jpg";
        $context['is_image']="/Messi/image";
        return $context;
    }
}
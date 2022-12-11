<?php
//require_once "TwigBaseController.php"; // импортим TwigBaseController

class MessiController extends TwigBaseController {
    public $template = "Object.twig";
    public $title = "Lionel Messiiiii";
    public function getContext() : array
    {
    
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $context['url_title']="Messi";
        return $context;
    }
}
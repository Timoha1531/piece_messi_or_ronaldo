<?php
//require_once "TwigBaseController.php"; // импортим TwigBaseController


class RonaldoController extends TwigBaseController {
    
    public $template = "Object.twig";
    public $title = "Cristano Ronaldoooo";
    public function getContext() : array
    {
        echo 123;
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $context['url_title']="Ronaldo";
        return $context;
    }
}
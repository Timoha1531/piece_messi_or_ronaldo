<?php
//require_once "TwigBaseController.php"; // импортим TwigBaseController

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";
    public function getContext() : array
    {
    
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        
           $query = $this->pdo->query("SELECT * FROM man_objects");
        
           // стягиваем данные через fetchAll() и сохраняем результат в контекст
           $context['man_objects'] = $query->fetchAll();
        return $context;
    }
  
    }
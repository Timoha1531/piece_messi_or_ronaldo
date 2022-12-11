<?php
//require_once "TwigBaseController.php"; // импортим TwigBaseController

class MainController extends TwigBaseController {
    public $template = "main.twig";
    public $title = "Главная";
    public function getContext() : array
    {
    
        $context = parent::getContext(); // вызываем родительский метод
        $context['title'] = $this->title; // добавляем title в контекст
        $context['menu_items']=[
            [
              "title" =>"Cristano Ronaldoooo",
              "url_title"=>"Ronaldo",
              "title_name"=>"Криштиану Рунальду"
    
            ],
            [
              "title" =>"Lionel Messiiiii",
              "url_title"=>"Messi",
              "title_name"=>"Леонеля Месси"
    
            ]
            ,
            [
              "title" =>"CR7 and Djordjina",
              "url_title"=>"atyrm",
              "title_name"=>"Криштиану с джорджиной"
    
            ]
            ,
            [
              "title" =>"Messi and Antonina",
              "url_title"=>"Messi_and_Antonina",
              "title_name"=>"Месси и Антонина"
    
            ]
            ,
            [
              "title" =>"Ronaldo son young",
              "url_title"=>"Ronaldo_son",
              "title_name"=>"Сын Криштиану"
    
            ]
           ];
           $query = $this->pdo->query("SELECT * FROM man_objects");
        
           // стягиваем данные через fetchAll() и сохраняем результат в контекст
           $context['man_objects'] = $query->fetchAll();
        return $context;
    }
  
    }
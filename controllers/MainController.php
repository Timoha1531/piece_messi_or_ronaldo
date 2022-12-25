<?php
require_once "BasePieceTwigController.php"; 

class MainController extends BasePieceTwigController {
    public $template = "main.twig";
    public $title = "Главная";
    public function getContext() : array
    {
    
        $context = parent::getContext();
       
        if (isset($_GET['type'])) {
            $query = $this->pdo->prepare("SELECT * FROM man_objects WHERE type= :type");
            $query->bindValue("type",$_GET['type']);
            $query->execute();
        } else {
            $query = $this->pdo->query("SELECT * FROM man_objects");
        }
        
           // стягиваем данные через fetchAll() и сохраняем результат в контекст
           $context['man_objects'] = $query->fetchAll();
           
           return $context;
    }
  
    }
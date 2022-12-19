<?php
require_once "BasePieceTwigController.php"; 
class objectsImageController extends BasePieceTwigController {
    
    public $template = "imageObject.twig"; // указываем шаблон
    

    public function getContext(): array
    {   
        
        $context = parent::getContext();
        if (isset($_GET['show']) && ($_GET['show'] == 'image')) {
            $query = $this->pdo->prepare("SELECT image, id FROM man_objects WHERE id=".$this-> params['id']);
            $this->template = "imageObject.twig"; 
            $query -> execute();
        } else {
            $query = $this->pdo->query("SELECT * FROM man_objects");
        }
        
        // готовим запрос к БД, допустим вытащим запись по id=3
        // тут уже указываю конкретные поля, там более грамотно
        //$query = $this->pdo->prepare("SELECT image,descriptions, id FROM man_objects WHERE id= :my_id");
       // $query->bindValue("my_id", $this->params['id']);
        //$query->execute(); 
        
        //$data = $query->fetch();
        
        // передаем описание из БД в контекст
        //$context['image'] = $data['image'];
       // $context['descriptions'] = $data['descriptions'];
        //$context['id'] = $data['id'];
        $context['man_objects'] = $query->fetchAll();
           
           return $context;
        
        
    }
}

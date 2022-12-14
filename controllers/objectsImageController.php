<?php

class objectsImageController extends TwigBaseController {
    public $template = "imageObject.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();
        
        
        // готовим запрос к БД, допустим вытащим запись по id=3
        // тут уже указываю конкретные поля, там более грамотно
        $query = $this->pdo->prepare("SELECT image,descriptions, id FROM man_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); 
        
        $data = $query->fetch();
        
        // передаем описание из БД в контекст
        $context['image'] = $data['image'];
        $context['descriptions'] = $data['descriptions'];
        $context['id'] = $data['id'];
        
        return $context;
    }
}
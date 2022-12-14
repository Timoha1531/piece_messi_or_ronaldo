<?php

class objectsController extends TwigBaseController {
    public $template = "Object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();
        
        
        // готовим запрос к БД, допустим вытащим запись по id=3
        // тут уже указываю конкретные поля, там более грамотно
        $query = $this->pdo->prepare("SELECT descriptions, id FROM man_objects WHERE id= :my_id");
        $query->bindValue("my_id", $this->params['id']);
        $query->execute(); 
        
        $data = $query->fetch();
        
        // передаем описание из БД в контекст
        $context['descriptions'] = $data['descriptions'];

        return $context;
    }
}
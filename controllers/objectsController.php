<?php

class ObjectController extends TwigBaseController {
    public $template = "Object.twig"; // указываем шаблон

    public function getContext(): array
    {
        $context = parent::getContext();
        
        // готовим запрос к БД, допустим вытащим запись по id=3
        // тут уже указываю конкретные поля, там более грамотно
        $query = $this->pdo->query("SELECT description, id FROM man_objects WHERE id=3");
        // стягиваем одну строчку из базы
        $data = $query->fetch();
        
        // передаем описание из БД в контекст
        $context['description'] = $data['description'];

        return $context;
    }
}
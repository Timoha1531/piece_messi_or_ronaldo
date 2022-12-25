<?php
require_once "BasePieceTwigController.php";

class ManObjectCreateController extends BasePieceTwigController {
    public $template = "man_object_create.twig";
    public function get(array $context) // добавили параметр
    {
       
        
        parent::get($context); // пробросили параметр
    }
    
    // добавил
    public function post(array $context) {
        // получаем значения полей с формы
        $title = $_POST['title'];
        $description = $_POST['description'];
        $type = $_POST['type'];
        $info = $_POST['info'];

        
        $tmp_name = $_FILES['image']['tmp_name'];
        $name =  $_FILES['image']['name'];
        move_uploaded_file($tmp_name, "../public/media/$name");
        $image_url = "/media/$name"; // формируем ссылку без адреса сервера

        // создаем текст запрос
        $sql = <<<EOL
        INSERT INTO man_objects(title,image, descriptions,info, type )
        VALUES(:title, :image_url, :description, :info, :type) -- передаем переменную в запрос
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("title", $title);
        $query->bindValue("description", $description);
        $query->bindValue("type", $type);
        $query->bindValue("info", $info);
        $query->bindValue("image_url", $image_url); // подвязываем значение ссылки к переменной  image_url
        $query->execute();
        
        $context['message'] = 'Вы успешно создали объект';
        $context['id'] = $this->pdo->lastInsertId(); // получаем id нового добавленного объекта
        $context['names'] = $query->fetchAll();

        $this->get($context);
    }
}
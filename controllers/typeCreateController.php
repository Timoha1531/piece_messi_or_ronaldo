<?php
require_once "BasePieceTwigController.php";

class typeCreateController extends BasePieceTwigController {
    public $template = "createType.twig";
    public function get(array $context) // добавили параметр
    {
       
        
        parent::get($context); // пробросили параметр
    }
    
    // добавил
    public function post(array $context) {
        
        $type = $_POST['type_name'];

    
        $sql = <<<EOL
        INSERT INTO man_type(name)
        VALUES(:type)
        INSERT INTO man_objects(type)
        VALUES(:)
        EOL;

        $query = $this->pdo->prepare($sql);
        $query->bindValue("type", $type);
        $query->execute();
        
        $context['message'] = 'Вы успешно добавили тип';
        $context['id'] = $this->pdo->lastInsertId(); // получаем id нового добавленного объекта
       

        $this->get($context);
    }
}
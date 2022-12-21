<?php
// класс абстрактный, чтобы нельзя было создать экземпляр
abstract class BaseController {
    public PDO $pdo;
    public array $params;
    public function setPDO(PDO $pdo) { // и сеттер для него
        $this->pdo = $pdo;
    }

    public function process_response() {
        $method = $_SERVER['REQUEST_METHOD'];
        $context = $this->getContext(); // вызываю context тут
        if ($method == 'GET') {
            $this->get($context); // а тут просто его пробрасываю внутрь
        } else if ($method == 'POST') {
            $this->post($context); // и здесь
        }
    }

    public function setParams(array $params) {
        $this->params = $params;
    }
    
    public function getContext(): array {
        return []; // по умолчанию пустой контекст
    }
    
    public function get(array $context) {} // ну и сюда добавил в качестве параметра 
    public function post(array $context) {} // и сюда
}
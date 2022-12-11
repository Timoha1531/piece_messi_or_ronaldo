<?php 
    
    require_once "../vendor/autoload.php";
    require_once "../framework/autoload.php";
    require_once "../controllers/MainController.php"; // добавим в самом верху ссылку на наш контроллер
    require_once "../controllers/RonaldoController.php";
    require_once "../controllers/RonaldoimageController.php";
    require_once "../controllers/RonaldoinfoController.php";
    require_once "../controllers/MessiController.php";
    require_once "../controllers/MessiimageController.php";
    require_once "../controllers/MessiinfoController.php";
    require_once "../controllers/Controller404.php";
    

    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader, [
        "debug" => true
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());
    
    $pdo = new PDO("mysql:host=localhost;dbname=piece_messi_or_ronaldo;charset=utf8", "root", "");
    
    $router = new Router($twig, $pdo);
    $router->add("#^/$#", MainController::class);
    $router->add("#^/Ronaldo$#", RonaldoController::class);
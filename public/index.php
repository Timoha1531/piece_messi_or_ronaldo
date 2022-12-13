<?php 
    
    require_once "../vendor/autoload.php";
    require_once "../framework/autoload.php";
    require_once "../controllers/MainController.php";
    require_once "../controllers/objectsController.php";
    //require_once "../controllers/RonaldoController.php";
    //require_once "../controllers/RonaldoimageController.php";
    //require_once "../controllers/RonaldoinfoController.php";
    //require_once "../controllers/MessiController.php";
    //require_once "../controllers/MessiimageController.php";
    //require_once "../controllers/MessiinfoController.php";
    require_once "../controllers/Controller404.php";
    
    

    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader, [
        "debug" => true
    ]);
    $twig->addExtension(new \Twig\Extension\DebugExtension());
    
    $pdo = new PDO("mysql:host=localhost;dbname=piece_messi_or_ronaldo;charset=utf8", "root", "");
    
    $router = new Router($twig, $pdo);
    $router->add("/", MainController::class);
    $router->add("/Ronaldo", RonaldoController::class);
    $router->add("/man-object/(\d+)", objectsController::class); 
    $router->get_or_default(Controller404::class);
    
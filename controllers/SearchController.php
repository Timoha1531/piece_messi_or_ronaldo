<?php
require_once "BasePieceTwigController.php"; 

class SearchController extends BasePieceTwigController {
    public $template = "search.twig";
    
    public function getContext() : array
    {
    
        $context = parent::getContext();
        $type=isset($_GET['type']) ? $_GET['type'] : '';
        $title=isset($_GET['title']) ? $_GET['title'] : '';
        $info=isset($_GET['info']) ? $_GET['info'] : '';
        
        $sql=<<<EOL
SELECT id,title,info
FROM man_objects
WHERE (:title = '' OR title like CONCAT('%',:title,'%'))
    AND (type_id=:type OR :type='All') AND (:info='' OR info like CONCAT('%', :info, '%'))
EOL;
$query=$this->pdo->prepare($sql);
$query->bindValue("title", $title);
$query->bindValue("type", $type);
$query->bindValue("info", $info);
$query->execute();

$context['objects']=$query->fetchAll();
           
           return $context;
    }
  
    }
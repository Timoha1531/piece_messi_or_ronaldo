<?php
echo 123;
require_once "BasePieceTwigController.php"; 
class objectsController extends BasePieceTwigController {
    public $template = "Object.twig"; // указываем шаблон


    public function getContext(): array
    {

        
        $context = parent::getContext();
        
        
        if (isset($_GET['show']) && ($_GET['show'] == 'image')) {
            $query = $this->pdo->prepare("SELECT image,descriptions, id FROM man_objects WHERE id=".$this-> params['id']);
            $this->template = "imageObject.twig"; 
            
            $query -> execute();
        } else if (isset($_GET['show']) && $_GET['show'] == 'info') {
            $query = $this->pdo->prepare("SELECT info,descriptions, id FROM man_objects WHERE id=".$this-> params['id']);
            $this->template = "infoObject.twig"; 
            
            $query -> execute();

        }else{
            $query = $this->pdo->query("SELECT * FROM man_objects");
        }
      
        $query = $this->pdo->query("SELECT id, image, info FROM man_objects WHERE id=".$this->params['id']);
     
       
        $context['object'] = $query->fetch();

        return $context;
    }
}
<?php 
    class BasePieceTwigController extends TwigBaseController{
        public function getContext(): array
        {
            $context = parent::getContext();
            
            
            
            $query = $this->pdo->query("SELECT id, name FROM man_type");
            $types = $query->fetchAll();
            
            $context['types'] = $types;
            

            
    
            return $context;
        }
    }
   
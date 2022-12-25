<?php 
    class BasePieceTwigController extends TwigBaseController{
        public function getContext(): array
        {
            $context = parent::getContext();
            
            
            
            $query = $this->pdo->query("SELECT DISTINCT name FROM man_type  ORDER BY 1");
            $types = $query->fetchAll();
            
            $context['types'] = $types;

            
    
            return $context;
        }
    }
   
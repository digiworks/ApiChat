<?php

namespace code\apichat;

use code\components\Component;

class ApiChat extends Component {

    public static function getComponenteId(){
        return "apichat";
    }
    
    public function __construct($id) {
        $this->setId($id);
    }

    protected function defineImports(): array {
        
    }

    protected function defineStylesheets(): array {
        
    }

    public function loadRoutes() {
        
    }

}

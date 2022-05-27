<?php

namespace code;

use code\components\Component;

class ApiChat extends Component {

    private $usersApiGateway;
    
    public function __construct($name, $conf) {
        parent::__construct($name, $conf);
    }

}

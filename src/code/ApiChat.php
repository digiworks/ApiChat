<?php

namespace code;

use code\components\Component;

class ApiChat extends Component {

    private $usersApiGateway;

    public function getUsersApiGateway() {
        return $this->usersApiGateway;
    }

    public function setUsersApiGateway($usersApiGateway): void {
        $this->usersApiGateway = $usersApiGateway;
    }

    public function __construct($name, $conf) {
        parent::__construct($name, $conf);
        if(isset($conf['usersApiGateway'])){
            $this->setUsersApiGateway($conf['usersApiGateway']);
        }
    }

}

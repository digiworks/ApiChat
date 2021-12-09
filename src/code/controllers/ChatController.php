<?php

namespace code\controllers;

use code\apichat\ApiChat;

class ChatController extends AppController {

    public function __construct() {
        $this->setComponent(new ApiChat(''));
    }

}

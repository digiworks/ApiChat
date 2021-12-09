<?php

namespace code\controllers;

use code\apichat\ApiChat;
use code\applications\ApiAppFactory;

class ChatController extends AppController {

    public function __construct() {
        $this->setComponent(ApiAppFactory::getApp()->getComponent(ApiChat::getComponenteId()));
    }

}

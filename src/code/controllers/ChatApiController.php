<?php

namespace code\controllers;

use code\apichat\ApiChat;


class ChatApiController extends AppController{

    public function __construct() {
        $this->setComponent(\code\applications\ApiAppFactory::getApp()->getComponent());
    }
}

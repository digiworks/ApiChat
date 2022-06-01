<?php

namespace code\controllers;

use code\ApiChat;
use code\applications\ApiAppFactory;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class ChatController extends AppController {

    public function __construct() {
        $this->setComponent(ApiAppFactory::getApp()->getComponent(ApiChat::getName()));
    }

    /**
     * 
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param array $args
     * @return ResponseInterface
     */
    public function home(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {

        try {
            $this->addJsParam("userApiGateway", $this->getComponent()->getUsersApiGateway());
            $currentView = 'js/views/dashboard.js';
            $this->setRequest($request)->setResponse($response)->setCurrentView($currentView)->buildViewResponse()->render();
        } catch (Exception $ex) {
            ApiAppFactory::getApp()->getLogger()->error("error", $ex->getMessage());
            ApiAppFactory::getApp()->getLogger()->error("error", $ex->getTraceAsString());
        }
        return $this->getResponse();
    }

}

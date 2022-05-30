<?php

namespace code\controllers;

use code\apichat\ApiChat;
use code\applications\ApiAppFactory;


class ChatApiController extends AppController{

    public function __construct() {
        $this->setComponent(ApiAppFactory::getApp()->getComponent(ApiChat::getComponenteId()));
    }
    
    public function latestChats(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {

        $this->response = $response;
        $this->request = $request;
        $count = $args['count'];
        $query = new \code\models\ChatsQuery();
        $data = $query->listLast(1, $count);
        $totalCount = count(data);
        $result = [
            'data' => $data,
            'totalCount' => $totalCount
        ];
        $this->response->withHeader("Content-Type", "application/json")->getBody()->write(json_encode($result, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        return $this->response;
    }
}

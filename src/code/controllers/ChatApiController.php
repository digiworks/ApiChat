<?php

namespace code\controllers;

use code\ApiChat;
use code\applications\ApiAppFactory;
use code\models\ChatsQuery;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;



class ChatApiController extends AppController{

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
    public function latestChats(ServerRequestInterface $request, ResponseInterface $response, array $args): ResponseInterface {

        $this->response = $response;
        $this->request = $request;
        $count = $args['count'];
        $query = new ChatsQuery();
        $data = $query->listLast(1, $count);
        $totalCount = $query->getCount();
        $result = [
            'data' => $data,
            'totalCount' => $totalCount
        ];
        $this->response->withHeader("Content-Type", "application/json")->getBody()->write(json_encode($result, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT));
        return $this->response;
    }
}

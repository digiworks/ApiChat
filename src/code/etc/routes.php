<?php

return [
    "routes" => [
                // Views Routes
        
                ["route" => "/chat", "method" => "GET", "controller" => "\code\controllers\ChatController:home"],
        
                // API Routes
        
                ["route" => "/api/chat/save", "method" => "POST", "controller" => "\code\controllers\ChatApiController:save"],
               
            ]
];

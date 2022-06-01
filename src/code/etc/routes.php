<?php

return [
    "routes" => [
                // Views Routes
        
                ["route" => "/chat", "method" => "GET", "controller" => "\code\controllers\ChatController:home"],
        
                // API Routes
                ["route" => "/api/chat/latest/{count}", "method" => "GET", "controller" => "\code\controllers\ChatApiController:latestChats"],
                ["route" => "/api/chat/create", "method" => "POST", "controller" => "\code\controllers\ChatApiController:create"],
                ["route" => "/api/chat/save", "method" => "POST", "controller" => "\code\controllers\ChatApiController:save"],
               
            ]
];

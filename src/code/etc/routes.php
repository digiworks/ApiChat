<?php

return [
    "routes" => [
                // Views Routes
        
                ["route" => "/chat", "method" => "GET", "controller" => "\controllers\ChatController:home"],
        
                // API Routes
        
                ["route" => "/api/chat/save", "method" => "POST", "controller" => "\controllers\ChatApiController:save"],
               
            ]
];

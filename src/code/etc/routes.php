<?php

return [
    "routes" => [
                // Views Routes
        
                ["route" => "/", "method" => "GET", "controller" => "\controllers\HomeController:home"],
        
                // API Routes
        
                ["route" => "/api/chat/save", "method" => "POST", "controller" => "\controllers\UserApiController:save"],
               
            ]
];

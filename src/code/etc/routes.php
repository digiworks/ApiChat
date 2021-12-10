<?php

return [
    "routes" => [
                // Views Routes
        
                ["route" => "/", "method" => "GET", "controller" => "\controllers\HomeController:home"],
        
                // API Routes
        
                ["route" => "/api/user/save", "method" => "POST", "controller" => "\controllers\UserApiController:save"],
               
            ]
];

<?php

use code\utility\Arr;

return Arr::mergeRecursive(
                [
                    "imports" => [
                        ['lib' => 'js/utilities/timezone.js', 'tranlsator' => ''],
                        ['lib' => 'js/utilities/colormapping.js', 'tranlsator' => ''],
                        ['lib' => 'js\react-spring-web\9.1.2\index.umd.js', 'tranlsator' => ''],
                        ['lib' => 'js/components/avatar/avatar.js', 'tranlsator' => 'text/babel'],
                    ],
                ],
                require 'routes.php');

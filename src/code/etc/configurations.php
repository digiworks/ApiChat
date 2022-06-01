<?php

use code\utility\Arr;

return Arr::mergeRecursive(
                [
                    "imports" => [
                        ['lib' => 'js/utilities/timezone.js', 'tranlsator' => ''],
                        ['lib' => 'js/utilities/colormapping.js', 'tranlsator' => ''],
                        ['lib' => 'js/react-spring-web/9.1.2/index.umd.js', 'tranlsator' => ''],
                        ['lib' => 'js/html-to-formatted-text/2.7.0/index.umd.js', 'tranlsator' => ''],
                        ['lib' => 'js/components/avatar/avatar.js', 'tranlsator' => 'text/babel'],
                        ['lib' => 'js/components/float/float.js', 'tranlsator' => 'text/babel'],
                        ['lib' => 'js/components/boop/boop.js', 'tranlsator' => 'text/babel'],
                        ['lib' => 'js/components/button/button.js', 'tranlsator' => 'text/babel'],
                    ],
                ],
                require 'routes.php');

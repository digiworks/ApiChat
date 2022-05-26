<?php

use code\utility\Arr;

return Arr::mergeRecursive(
                [
                    "imports" => [
                        ['lib' => 'js/utilities/timezone.js', 'tranlsator' => ''],
                        ['lib' => 'js/utilities/colormapping.js', 'tranlsator' => ''],
                        ['lib' => 'js/components/avatar/avatar.js', 'tranlsator' => 'text/babel'],
                    ],
                ],
                require 'routes.php');

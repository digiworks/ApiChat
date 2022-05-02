<?php

use code\utility\Arr;



return Arr::mergeRecursive(
                [
                    "imports" => [
                            ['lib' => 'js/utilities/timezone.js', 'tranlsator' => ''],
                        ],
                ],
                require 'routes.php');

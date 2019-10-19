<?php

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Kaythinks\Eazycurl\Eazycurl;

echo Eazycurl::getApiResponse('https://jsonplaceholder.typicode.com/todos/11');
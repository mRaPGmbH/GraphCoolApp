<?php

require_once __DIR__ . '/vendor/autoload.php';

use \Mrap\GraphCool\GraphCool;

$args = $_SERVER['argv'];
array_shift($args); // remove script.php

const APP_ROOT_PATH = __DIR__;

GraphCool::runScript($args);
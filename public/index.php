<?php
header('Allow: GET,HEAD,POST');
header('Accept: application/json');
header('Accept-Charset: utf-8');
header('Accept-Encoding: gzip, deflate');
header('Cache-Control: no-cache, private');

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Accept, Content-Type, Authorization');
header('Access-Control-Allow-Methods: POST, GET, HEAD');
header('Access-Control-Max-Age: 86400');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_REQUEST['q']) && str_starts_with($_REQUEST['q'], '/file/download/')) {
        require_once __DIR__ . '/../scripts/download.php';
    }
    exit(0);
}

require_once __DIR__ . '/../vendor/autoload.php';

use Mrap\GraphCool\GraphCool;
use Mrap\GraphCool\Utils\ClassFinder;

ClassFinder::setRootPath(dirname(__DIR__));

GraphCool::run();
<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Mrap\GraphCool\DataSource\DB;
use Mrap\GraphCool\DataSource\File;
use Mrap\GraphCool\Utils\ClassFinder;
use Mrap\GraphCool\Utils\Env;
use Mrap\GraphCool\Utils\JwtAuthentication;

try {
    JwtAuthentication::authenticate();
} catch (\GraphQL\Error\Error $e) {
    http_response_code(401);
    exit(0);
}

ClassFinder::setRootPath(dirname(__DIR__));
Env::init();

$request = explode('/', $_REQUEST['q']);
[$name, $id, $key] = explode('.', $request[3]);

$file = DB::load(JwtAuthentication::tenantId(), $name, $id);

if ($file === null) {
    http_response_code(404);
    exit(0);
}

header('Content-Type: '.$file->mime_type);
header('Content-Disposition: attachment; filename="'.$file->filename.'"');

$value = '';

$data = File::retrieve($name, $id, $key, $value);
$closure = $data->data_base64;
echo base64_decode($closure());
exit(0);

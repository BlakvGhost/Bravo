<?php

$allowedOrigins = [
    'https://kabirou-alassane.com',
];

$origin = $_SERVER['HTTP_ORIGIN'] ?? '';

if (!$origin) {
    $headers = getallheaders();
    $origin = $headers['Origin'] ?? '';
}

if (in_array($origin, $allowedOrigins)) {
    header('Access-Control-Allow-Origin: ' . $origin);
    header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
} else {
    header('HTTP/1.1 403 Forbidden');
    exit();
}

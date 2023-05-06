<?php

use Symfony\Component\Dotenv\Dotenv;

$dotenv = new Dotenv();

$dotenv->loadEnv(__DIR__ . '/../.env');

use Illuminate\Database\Capsule\Manager as Capsule;


$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => $_ENV['DB_CONNECTION'],
    'host'      => $_ENV['DB_HOST'],
    'database'  => $_ENV['DB_DATABASE'],
    'username'  => $_ENV['DB_USERNAME'],
    'password'  => $_ENV['DB_PASSWORD'],
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->bootEloquent();


/**
 * Prends un nom de session et renvois le message contenu dans la clée au niveau de la variable globale SESSION puis vide cette variable
 */
function session($name, $del = true)
{
    $message = isset($_SESSION[$name]) ? $_SESSION[$name] : null;

    if ($del) unset($_SESSION[$name]);

    return $message;
}

/**
 * Retourne la route d'un url selon son alias
 * @param string $alias The alias of the Route
 */
function route(string $alias): string
{
    $routes = isset($_SESSION['routes']) ? $_SESSION['routes'] : [];

    return isset($routes[$alias]) ? '/' . $routes[$alias] : '/';
}

function setPayloads($payloadsData)
{
    $GLOBALS['payloads'] = $payloadsData;
}

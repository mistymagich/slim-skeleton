<?php

// Composer autoloading
require '../vendor/autoload.php';

// Prepare app
$app = new \Slim\Slim(array(
    'templates.path' => __DIR__ . '/views',
        ));

// Create monolog logger and store logger in container as singleton 
// (Singleton resources retrieve the same log resource definition each time)
$app->container->singleton('log', function () {
    $log = new \Monolog\Logger('slim-skeleton');
    $log->pushHandler(new \Monolog\Handler\StreamHandler(__DIR__ . '/logs/app.log', \Monolog\Logger::DEBUG));
    return $log;
});

// Prepare view
$app->view(new \Slim\Views\Twig());
$app->view->parserOptions = array(
    'debug' => true,
    'charset' => 'utf-8',
    'cache' => realpath(__DIR__ . '/cache'),
    'auto_reload' => true,
    'strict_variables' => false,
    'autoescape' => true
);
$app->view->parserExtensions = array(new \Slim\Views\TwigExtension());

require "routes.php";
// Run app
$app->run();

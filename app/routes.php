<?php

// Define routes
$app->get('/', function () use ($app) {
    // Sample log message
    $app->log->info("Slim-Skeleton '/' route");
    // Render index view
    $app->render('index.html');
});

// Define named route
$app->get('/hello/:name', function ($name) use ($app) {
    $app->log->debug("Slim-Skeleton '/hello' route");
    $app->render('profile.html', array('name' => $name));
})->setName('profile');

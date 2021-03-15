<?php
use \core\Utils;
use \core\DataBase;
use \Slim\Slim;

$app = new Slim();

new DataBase;

$app->config('debug', Utils::config("app.debug"));

$app->get('/', fn() => \controllers\Home::main($app));

$app->get('/:id', fn() => \controllers\Home::main($app));

$app->run();

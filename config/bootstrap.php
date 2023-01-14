<?php

use DI\ContainerBuilder;
use Mongolid\Connection\Connection;
use Mongolid\Connection\Manager;
use Slim\App;

require_once __DIR__ . '/../vendor/autoload.php';

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions(__DIR__ . '/container.php');

$container = $containerBuilder->build();

$app = $container->get(App::class);

(require __DIR__ . '/routes.php')($app);

$manager = new Manager();
$manager->setConnection(new Connection('mongodb://dbcat'));

//(require __DIR__ . '/middleware.php')($app);

return $app;
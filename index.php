<?php

declare(strict_types=1);

use flight\Container;
use flight\template\View;
use Symfony\Component\Dotenv\Dotenv;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/routes/web.php';
require_once __DIR__ . '/routes/api.php';

$dotenv = new Dotenv;
$dotenv->load(__DIR__ . '/.env.dist', __DIR__ . '/.env');

$container = new Container;

$container->singleton(PDO::class, static fn(): PDO => new PDO(
  match (strtolower((string) $_ENV['DB_CONNECTION'])) {
    'sqlite' => 'sqlite:'
      . __DIR__
      . '/database/'
      . ($_ENV['DB_DATABASE'] ?? 'flighravel')
      . '.db',
    'mysql' => 'mysql:host='
      . $_ENV['DB_HOST']
      . ';dbname='
      . $_ENV['DB_DATABASE']
      . ';port='
      . $_ENV['DB_PORT'],
  },
  $_ENV['DB_USERNAME'] ?? null,
  $_ENV['DB_PASSWORD'] ?? null,
));

$container->singleton(View::class, Flight::view());

Flight::registerContainerHandler($container->get(...));
Flight::view()->path = __DIR__ . '/resources/views';
Flight::view()->preserveVars = false;
Flight::start();

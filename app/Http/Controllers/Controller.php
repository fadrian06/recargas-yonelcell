<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Flight;

abstract readonly class Controller
{
  protected static function renderPage(
    string $page,
    string $title,
    string $layout,
    array $data = []
  ): never {
    $data['title'] ??= $title;

    Flight::render("pages/$page", $data, 'content');
    Flight::render("layouts/$layout", $data);

    exit;
  }
}

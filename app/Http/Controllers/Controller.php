<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use flight\template\View;

abstract readonly class Controller
{
  public function __construct(private View $view)
  {
    // ...
  }

  protected function renderPage(
    string $page,
    string $title,
    string $layout,
    array $data = []
  ): void {
    $data['title'] ??= $title;
    $data['content'] = $this->view->fetch("pages/$page", $data);
    $this->view->render("layouts/$layout", $data);
  }
}

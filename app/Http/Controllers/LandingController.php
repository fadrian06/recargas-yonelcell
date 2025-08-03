<?php

declare(strict_types=1);

namespace App\Http\Controllers;

final readonly class LandingController extends Controller
{
  public function index(): void
  {
    $this->renderPage(page: 'landing', title: 'Inicio', layout: 'landing');
  }
}

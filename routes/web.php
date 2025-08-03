<?php

declare(strict_types=1);

use App\Http\Controllers\LandingController;

Flight::route('GET /', [LandingController::class, 'index']);

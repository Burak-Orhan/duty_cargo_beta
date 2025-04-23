<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrackingController;

Route::get("/", [TrackingController::class, "tracking"])->name("tracking");

Route::post("/", [TrackingController::class, "trackingPost"])->name("tracking.post");
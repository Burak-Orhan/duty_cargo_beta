<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::middleware("auth")->group(function () {
    Route::get("/dashboard", [DashboardController::class, "dashboard"])->name("dashboard");
    Route::get("/settings", [DashboardController::class, "settings"])->name("settings");

    Route::post("/settings", [DashboardController::class, "settingsPost"])->name("settings.post");
});

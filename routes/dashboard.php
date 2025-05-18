<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use Illuminate\Http\Request;

Route::middleware("auth")->group(function () {
    Route::get("/dashboard", [DashboardController::class, "dashboard"])->name("dashboard");
    Route::get("/settings", [DashboardController::class, "settings"])->name("settings");
    Route::get('/get-city-info/{id}', [DashboardController::class, 'cityInfo']);

    Route::post("/dashboard", [DashboardController::class, "dashboardPost"])->name("dashboard.post");
    Route::post("/settings", [DashboardController::class, "settingsPost"])->name("settings.post");
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get("/login", [AuthController::class, "login"])->name("login");
Route::get("/register", [AuthController::class, "register"])->name("register");
Route::get("/forget-password", [AuthController::class, "forgetPassword"])->name("forgetPassword");
Route::get("/logout", [AuthController::class, "logout"])->name("logout");

Route::post("/login", [AuthController::class, "loginPost"])->name("login.post");
Route::post("/register", [AuthController::class, "registerPost"])->name("register.post");
Route::post("/forget-password", [AuthController::class, "forgetPasswordPost"])->name("forgetPassword.post");

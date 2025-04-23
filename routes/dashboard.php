<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::middleware("auth")->group(function () {
    Route::get("/dashboard", [DashboardController::class, "dashboard"])->name("dashboard");
    Route::get("/settings", [DashboardController::class, "settings"])->name("settings");

    Route::post("/settings", [DashboardController::class, "settingsPost"])->name("settings.post");

    Route::get("/deneme", function () {
        $user = DB::table("users")->where("id", 6)->first();

        $userI = DB::table("user_information as uI")
            ->join("users", "users.id", "=", "uI.user_id")
            ->where("uI.user_id", 6)
            ->select("uI.*", "users.name", "users.email") // gerekli alanları seçebilirsin
            ->first();


        foreach ($userI as $u) {
            echo $u->address . " " . $u->phone . " ";
        }

        foreach ($user as $u) {
            echo $u->email . " " . $u->name . " ";
        }
    });

    Route::get("/tracking", function () {
        $cargoInfo = DB::table('cargos')
            ->join('company as companies', 'cargos.company_id', '=', 'companies.id')
            ->join('customer as customers', 'cargos.customer_id', '=', 'customers.id')
            ->join('users', 'customers.user_id', '=', 'users.id')
            ->select(
                'cargos.id as cargo_id',
                'companies.name as company_name',
                'companies.city as company_city',
                'users.name as customer_name',
                'customers.purchase_date',
                'cargos.created_at as cargo_created_at'
            )
            ->first(); // veya ->get() ile tümünü alabilirsin

        dd($cargoInfo);
    });
});

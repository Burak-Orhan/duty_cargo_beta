<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();

        $trackings = DB::table('cargos as c')
            ->select([
                'u.name as users_name',
                'c.tracking_code as trackingCode',
                'co.country as company_country',
                'co.name as company_name',
                'ui.country as users_information_country',
                'ui.city as users_information_city',
                'cu.purchase_date as customer_purchase_date',
                'c.id as cargo_id',
            ])
            ->join('users as u', 'u.id', '=', 'c.user_id')
            ->join('companies as co', 'co.id', '=', 'c.company_id')
            ->join('customers as cu', function ($join) {
                $join->on('cu.user_id', '=', 'u.id')
                    ->on('cu.cargo_id', '=', 'c.id');
            })
            ->Join('user_information as ui', 'ui.id', '=', 'cu.user_information_id')
            ->orderByDesc('c.id')
            ->get();


        // $trackings = DB::table('cargos as c')
        // ->select([
        //     'u.name as users_name',
        //     'c.tracking_code as trackingCode',
        //     'co.country as company_country',
        //     'co.name as company_name',
        //     'ui.country as users_information_country',
        //     'ui.city as users_information_city',
        //     'cu.purchase_date as customer_purchase_date',
        // ])
        // ->join('users as u', 'u.id', '=', 'c.user_id')
        // ->join('companies as co', 'co.id', '=', 'c.company_id')
        // ->join('user_information as ui', function ($join) {
        //     $join->on('ui.user_id', '=', 'u.id')
        //         ->whereRaw('ui.id = (SELECT MAX(id) FROM user_information WHERE user_id = u.id)');
        // })
        // ->join('customers as cu', function ($join) {
        //     $join->on('cu.user_id', '=', 'u.id')
        //         ->whereRaw('cu.purchase_date = (SELECT MAX(purchase_date) FROM customers WHERE user_id = u.id)');
        // })
        // ->where('u.id', 1)
        // ->orderByDesc('c.id')
        // ->get();

        // $trackings = DB::table('cargos as c')
        // ->select([
        //     'c.tracking_code as trackingCode',
        //     'co.name as company_name',
        //     'co.country as company_country',
        //     'cu.purchase_date as customer_purchase_date',
        //     'c.created_at as cargo_created_at', // Kargo gönderim tarihi
        //     'ui.city as users_information_city',
        //     "ui.country as users_information_country",
        // ])
        // ->join('company as co', 'co.id', '=', 'c.company_id')
        // ->leftJoin('users as u', 'u.id', '=', 'c.user_id')
        // ->leftJoin(DB::raw('
        //     (
        //         SELECT ui1.*
        //         FROM user_information ui1
        //         WHERE ui1.id IN (SELECT MAX(id) FROM user_information GROUP BY user_id)
        //     ) as ui
        // '), 'ui.user_id', '=', 'u.id')
        // ->leftJoin(DB::raw('
        //     (
        //         SELECT c1.*
        //         FROM customer c1
        //         INNER JOIN (
        //             SELECT cargos_id, MAX(id) as max_id
        //             FROM customer
        //             GROUP BY cargos_id
        //         ) c2 ON c1.id = c2.max_id
        //     ) as cu
        // '), 'cu.cargos_id', '=', 'c.id')
        // ->orderByDesc('c.id')
        // ->get();

        // $trackings = DB::table('cargos as c')
        //     ->select([
        //         'u.name as users_name',
        //         'c.tracking_code as trackingCode',
        //         'co.country as company_country',
        //         'co.name as company_name',
        //         'ui.country as users_information_country',
        //         'ui.city as users_information_city',
        //         'cu.purchase_date as customer_purchase_date',
        //     ])
        //     ->join('users as u', 'u.id', '=', 'c.user_id')
        //     ->join('company as co', 'co.id', '=', 'c.company_id')
        //     ->leftJoin('user_information as ui', function ($join) use ($user) {
        //         $join->on('ui.user_id', '=', 'u.id');
        //     })
        //     ->leftJoin(DB::raw('
        //         (
        //             SELECT c1.*
        //             FROM customer c1
        //             INNER JOIN (
        //                 SELECT cargos_id, MAX(id) as max_id
        //                 FROM customer
        //                 GROUP BY cargos_id
        //             ) c2 ON c1.id = c2.max_id
        //         ) as cu
        //     '), 'cu.cargos_id', '=', 'c.id')
        //     ->orderByDesc('c.id')
        //     ->get();

        Carbon::setLocale("tr");
        $trackingsCount = $trackings->count();
        $firstTracking = $trackings->first();

        $lastTracking = $firstTracking ? Carbon::parse($firstTracking->customer_purchase_date)->diffForHumans() : null;
        $lastTrackingLong = $firstTracking ? Carbon::parse($firstTracking->customer_purchase_date)->format('d.m.Y H:i') : null;

        // return view("dashboard.dashboard", compact("trackings", "user", "trackingsCount", "lastTracking", "lastTrackingLong"));
        return view("dashboard.dashboard")->with([
            "trackings" => $trackings,
            "user" => $user,
            "trackingsCount" => $trackingsCount,
            "lastTracking" => $lastTracking,
            "lastTrackingLong" => $lastTrackingLong,
        ]);
    }

    public function settings()
    {
        return view("dashboard.settings");
    }

    public function settingsPost(Request $request)
    {
        $user = Auth::user();
        $userInformation = $user->userInformation;

        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        $userData = collect($validatedData)->only([
            "email",
            "name"
        ])->toArray();

        $userInformationData = collect($validatedData)->only([
            "phone",
            "city",
            "state",
            "zip_code",
            "address"
        ])->toArray();


        $user->update($userData);
        $userInformation->update($userInformationData);

        return redirect()->route("settings")->with('success', 'Hesap Ayarları Güncellendi.');
    }
}

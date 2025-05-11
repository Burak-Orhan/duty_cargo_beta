<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        Carbon::setLocale("tr");
        $user = Auth::user();
        $search = $request->input('search');
        $perPage = $request->input('per_page', 10); 

        $query = DB::table('cargos as c')
            ->select([
                'u.name as users_name',
                'u.email as user_email',
                'c.tracking_code as trackingCode',
                'c.id as cargo_id',
                'c.status as cargo_status',
                'co.country as company_country',
                'co.name as company_name',
                'ui.country as users_information_country',
                'ui.city as users_information_city',
                'cu.purchase_date as customer_purchase_date',
            ])
            ->join('users as u', 'u.id', '=', 'c.user_id')
            ->join('companies as co', 'co.id', '=', 'c.company_id')
            ->join('customers as cu', function ($join) {
                $join->on('cu.user_id', '=', 'u.id')
                    ->on('cu.cargo_id', '=', 'c.id');
            })
            ->join('user_information as ui', 'ui.id', '=', 'cu.user_information_id');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('u.name', 'like', '%' . $search . '%')
                    ->orWhere('u.email', 'like', '%' . $search . '%')
                    ->orWhere('c.tracking_code', 'like', '%' . $search . '%');
            });
        }

        $companies = DB::table("companies as co")
        ->select([
            "co.id as companies_id",
            "co.name as companies_name",
            "co.country as companies_country"
        ])->get();

        // dd($companies);

        $trackings = $query->orderByDesc('c.id')->paginate($perPage);
        $trackingsCount = $trackings->total();
        // $trackingsCount = $trackings->count();

        $receivedFromWarehouse = Cargos::where("status", 1)->count();
        $cargoesSetOff = Cargos::where("status", 2)->count();
        $cargoesInDistribution = Cargos::where("status", 3)->count();
        $cargoesDelivered = Cargos::where("status", 4)->count();
        $cargoesCanceled = Cargos::where("status", 5)->count();

        $firstTracking = $trackings->first();
        $lastTrackingTime = $firstTracking ? Carbon::parse($firstTracking->customer_purchase_date)->diffForHumans() : null;
        $lastTrackingLongTime = $firstTracking ? Carbon::parse($firstTracking->customer_purchase_date)->format('d.m.Y H:i') : null;

        return view("dashboard.dashboard")->with([
            "user" => $user,
            "trackings" => $trackings,
            "trackingsCount" => $trackingsCount,
            "lastTrackingTime" => $lastTrackingTime,
            "lastTrackingLongTime" => $lastTrackingLongTime,
            "receivedFromWarehouse" => $receivedFromWarehouse,
            "cargoesSetOff" => $cargoesSetOff,
            "cargoesInDistribution" => $cargoesInDistribution,
            "cargoesDelivered" => $cargoesDelivered,
            "cargoesCanceled" => $cargoesCanceled,
            "search" => $search,
            "companies" => $companies,
        ]);
    }

    public function newCargoCreate(){
        
    }

    // public function dashboard()
    // {
    //     Carbon::setLocale("tr");
    //     $user = Auth::user();

    //     $trackings = DB::table('cargos as c')
    //         ->select([
    //             'u.name as users_name',
    //             'c.tracking_code as trackingCode',
    //             'c.id as cargo_id',
    //             'c.status as cargo_status',
    //             'co.country as company_country',
    //             'co.name as company_name',
    //             'ui.country as users_information_country',
    //             'ui.city as users_information_city',
    //             'cu.purchase_date as customer_purchase_date',
    //         ])
    //         ->join('users as u', 'u.id', '=', 'c.user_id')
    //         ->join('companies as co', 'co.id', '=', 'c.company_id')
    //         ->join('customers as cu', function ($join) {
    //             $join->on('cu.user_id', '=', 'u.id')
    //                 ->on('cu.cargo_id', '=', 'c.id');
    //         })
    //         ->Join('user_information as ui', 'ui.id', '=', 'cu.user_information_id')
    //         ->orderByDesc('c.id')
    //         ->get();

    //     $trackingsCount = $trackings->count();
    //     $receivedFromWarehouse = Cargos::whereRaw("status = 1")->count();
    //     $cargoesSetOff = Cargos::whereRaw("status = 2")->count();
    //     $cargoesInDistribution = Cargos::whereRaw("status = 3")->count();
    //     $cargoesDelivered = Cargos::whereRaw("status = 4")->count();

    //     $firstTracking = $trackings->first();
    //     $lastTrackingTime = $firstTracking ? Carbon::parse($firstTracking->customer_purchase_date)->diffForHumans() : null;
    //     $lastTrackingLongTime = $firstTracking ? Carbon::parse($firstTracking->customer_purchase_date)->format('d.m.Y H:i') : null;

    //     // return view("dashboard.dashboard", compact("trackings", "user", "trackingsCount", "lastTracking", "lastTrackingLong"));
    //     return view("dashboard.dashboard")->with([
    //         "user" => $user,
    //         "trackings" => $trackings,
    //         "trackingsCount" => $trackingsCount,
    //         "lastTrackingTime" => $lastTrackingTime,
    //         "lastTrackingLongTime" => $lastTrackingLongTime,
    //         "receivedFromWarehouse" => $receivedFromWarehouse,
    //         "cargoesSetOff" => $cargoesSetOff,
    //         "cargoesInDistribution" => $cargoesInDistribution,
    //         "cargoesDelivered" => $cargoesDelivered,
    //     ]);
    // }

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

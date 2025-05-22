<?php

namespace App\Http\Controllers;

use App\Models\Cargos;
use App\Models\Cities;
use App\Models\Customer;
use App\Models\UserInformation;
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

        if (!$user->is_admin)
            $query->where("c.user_id", $user->id);

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('u.name', 'like', '%' . $search . '%')
                    ->orWhere('u.email', 'like', '%' . $search . '%')
                    ->orWhere('c.status', 'like', '%' . $search . '%')
                    ->orWhere('c.tracking_code', 'like', '%' . $search . '%');
            });
        }

        $companies = DB::table("companies as co")
            ->select([
                "co.id as companies_id",
                "co.name as companies_name",
                "co.country as companies_country"
            ])->get();

        $cities = Cities::get();

        $lastCargo = Cargos::orderBy("id", "desc")->first();
        if ($lastCargo && preg_match('/KRG(\d+)/', $lastCargo->tracking_code, $matches)) {
            $number = (int) $matches[1] + 1;
            $newTracking_Code = 'KRG' . str_pad($number, 4, '0', STR_PAD_LEFT);
        } else {
            $newTracking_Code = 'KRG0001';
        }

        $trackings = $query->orderByDesc('c.id')->paginate($perPage);
        $trackingsCount = $trackings->total();

        $statuses = [
            'receivedFromWarehouse' => 1,
            'cargoesSetOff' => 2,
            'cargoesInDistribution' => 3,
            'cargoesDelivered' => 4,
            'cargoesCanceled' => 5,
        ];

        foreach ($statuses as $varName => $status) {
            $$varName = Cargos::where("status", $status);
            if (!$user->is_admin) {
                $$varName->where("user_id", $user->id);
            }
            $$varName = $$varName->count();
        }

        $cargoStats = [
            'total' => [
                'title' => 'Toplam Kargo',
                'count' => Cargos::when(!$user->is_admin, function ($query) use ($user) {
                    return $query->where("user_id", $user->id);
                })->count(),
                'description' => 'Toplam kargo sayısı',
                'color_class' => 'gray',
                'icon' => '📦',
            ],
            'receivedFromWarehouse' => [
                'title' => 'Depodan Teslim Alındı',
                'count' => $receivedFromWarehouse,
                'description' => 'Depo teslimi',
                'color_class' => 'green',
                'icon' => '✓',
            ],
            'cargoesSetOff' => [
                'title' => 'Yola Çıktı',
                'count' => $cargoesSetOff,
                'description' => 'Yolculukta',
                'color_class' => 'purple',
                'icon' => '✈️',
            ],
            'cargoesInDistribution' => [
                'title' => 'Dağıtımda',
                'count' => $cargoesInDistribution,
                'description' => 'Dağıtım aşaması',
                'color_class' => 'blue',
                'icon' => '🚚',
            ],
            'cargoesDelivered' => [
                'title' => 'Teslim Edildi',
                'count' => $cargoesDelivered,
                'description' => 'Yolculukta',
                'color_class' => 'green',
                'icon' => '✓✓',
            ],
            'cargoesCanceled' => [
                'title' => 'İptal Edilen',
                'count' => $cargoesCanceled,
                'description' => 'İptal edilen kargolar',
                'color_class' => 'red',
                'icon' => '✗',
            ],
        ];

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
            "search" => $search,
            "companies" => $companies,
            "newTracking_Code" => $newTracking_Code,
            "cities" => $cities,
            "cargoStats" => $cargoStats,
        ]);
    }

    public function cityInfo($id)
    {
        $city = Cities::findOrFail($id);

        return response()->json([
            'city' => $city->city,
            'state' => $city->state,
            'district' => $city->district,
            'zip_code' => $city->zip_code,
            "address" => $city->address,
        ]);
    }

    public function dashboardPost(Request $request)
    {
        $user = Auth::user();

        $validate = $request->validate([
            "tracking_code" => "required",
            "status" => "required",
            "company_id" => "required",
            "modal_user_name" => "required|string|max:255",
            "phone" => "nullable|string|max:255",
            "users_information_city" => "nullable|string|max:255",
            "city" => "nullable|string|max:255",
            "state" => "nullable|string|max:255",
            "district" => "nullable|string|max:255",
            "zip_code" => "nullable|string|max:255",
            "address" => "nullable|string|max:500",
            "country" => "nullable|string|max:20",
        ]);

        $cargosData = collect($validate)->only([
            "tracking_code",
            "company_id",
            "status"
        ])->toArray();
        $cargosData['user_id'] = $user->id;

        $userInformatonData = collect($validate)->only([
            "modal_user_name",
            "country",
            "phone",
            "city",
            "state",
            "district",
            "zip_code",
            "address"
        ])->toArray();
        $userInformatonData['user_id'] = $user->id;

        $cargo = Cargos::create($cargosData);
        $userInformation = UserInformation::create($userInformatonData);

        Customer::create([
            'user_id' => $user->id,
            'cargo_id' => $cargo->id,
            'purchase_date' => now(),
            'user_information_id' => $userInformation->id
        ]);

        return redirect()->back()->with('success', 'Kargo başarıyla eklendi.');
    }

    public function settings()
    {
        $user = Auth::user();
        $cities = Cities::get();

        $q = DB::table("user_information as ui")
            ->select([
                "ui.city",
                "ci.id as cities_id"
            ])
            ->join("cities as ci", "ci.city", "ui.city")
            ->where("ui.id", $user->id)
            ->first();

        return view("dashboard.settings")->with([
            "cities" => $cities,
            "q" => $q,
        ]);
    }

    public function settingsPost(Request $request)
    {
        $user = Auth::user();
        $userInformation = $user->userInformation;

        $validatedData = $request->validate([
            'email' => 'required|email|unique:users,email,' . $user->id,
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'city' => 'nullable|integer|exists:cities,id',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'address' => 'nullable|string|max:500',
        ]);

        $userData = collect($validatedData)->only([
            "email",
            "name"
        ])->toArray();

        $cityName = null;
        if (!empty($validatedData['city'])) {
            $city = Cities::find($validatedData['city']);
            $cityName = $city?->city;
        }

        $userInformationData = collect($validatedData)->only([
            "phone",
            "district",
            "state",
            "zip_code",
            "address"
        ])->toArray();
        $userInformationData['city'] = $cityName;

        $user->update($userData);
        $userInformation->update($userInformationData);

        return redirect()->route("settings")->with('success', 'Hesap Ayarları Güncellendi.');
    }

}

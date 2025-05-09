<?php

// app/Http/Controllers/TrackingController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cargos;
use Illuminate\Support\Facades\DB;

class TrackingController extends Controller
{
    public function tracking()
    {
        return view("tracking.tracking");
    }

    public function trackingPost(Request $request)
    {
        $trackingCode = DB::table("users", "u")
            ->select(
                "u.name as users_name",
                "c.tracking_code",
                "co.name as company_name",
                "co.country as company_country",
                "co.city as company_city",
                "co.state as company_state",
                "co.post_date as company_post_date",
                "ui.city as users_information_city",
                "ui.country as users_information_country",
                "cu.purchase_date as customer_purchase_date"
            )
            ->join("cargos as c", "c.user_id", "=", "u.id")
            ->join("companies as co", "co.id", "=", "c.company_id")
            ->join("customers as cu", "cu.cargo_id", "=", "c.id") 
            ->join("user_information as ui", "ui.user_id", "=", "u.id")
            ->where("c.tracking_code", "=", $request->trackingCode)
            ->first();

        // dd($trackingCode);

        if (!$trackingCode) {
            return back()->with('error', 'Bu takip koduna ait bir kargo bulunamadı.');
        }

        return view("tracking.trackingResult", compact('trackingCode'));
    }
}

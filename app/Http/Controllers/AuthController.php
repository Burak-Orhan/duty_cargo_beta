<?php

namespace App\Http\Controllers;

use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use League\Uri\Contracts\UserInfoInterface;

class AuthController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("dashboard");
        }
        return back()->with("error", "Email Veya Şifre Hatalı")->withInput();
    }

    public function register()
    {
        return view("auth.register");
    }

    public function registerPost(Request $request)
    {
        $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "email", "max:255", "unique:users"],
            "password" => ["required", "string", "min:8", "confirmed"],
            "phone" => ["required"],
            "city" => ["required"],
            "state" => ["required"],
            "district" => ["required"],
            "zip_code" => ["required"],
            "address" => ["required"],
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        $userInformation = UserInformation::create([
            "modal_user_name" => $user->name,
            "country" => 'Türkiye',
            "user_id" => $user->id,
            "phone" => $request->phone,
            "city" => $request->city,
            "state" => $request->state,
            "district" => $request->district,
            "zip_code" => $request->zip_code,
            "address" => $request->address,
        ]);

        if ($user->save() || $userInformation->save()) {
            Auth::login($user);
            return redirect()->route("dashboard")->with("success", "Başarıyla Kayıt Olundu");
        }
        return redirect()->back()->with("error", "Kayıt Olurken Bir Hata Oluştu");
    }

    public function forgetPassword()
    {
        return view("auth.forgetPassword");
    }

    public function forgetPasswordPost(Request $request)
    {
        $request->validate([
            "email" => ["required", "email"],
            "new_password" => ["required", "min:8"],
            "new_password_verify" => ["required", "same:new_password"],
        ]);

        $user = User::where("email", $request->email)->first();

        if (!$user) {
            return redirect()->back()->with("error", "Kullanıcı Bulunamadı");
        }

        $user->password = Hash::make($request->new_password);

        if ($user->save()) {
            return redirect()->route("login")->with("success", "Şifre Başarıyla Güncellenmiştir.");
        }

        return redirect()->back()->with("error", "Şifre Güncellenirken Bir Hata Oluştu");
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route("login");
    }

}

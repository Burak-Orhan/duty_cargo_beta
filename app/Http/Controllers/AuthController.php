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
    public function login(){
        return view("auth.login");
    }

    public function loginPost(Request $request){
        $credentials  = $request->validate([
            "email" => ["required", "email"],
            "password" => ["required"]
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended("dashboard");
        }
        return back()->with("error", "Email Veya Şifre Hatalı")->withInput();
    }

    public function register(){
        return view("auth.register");
    }

    public function registerPost(Request $request){
        $request->validate([
            "name" => ["required", "string", "max:255"],
            "email" => ["required", "email", "max:255", "unique:users"],
            "password" => ["required", "string", "min:8", "confirmed"],
            "phone" => ["required"],
            "address" => ["required"]
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
        ]);

        $userInformation = UserInformation::create([
            "user_id" => $user->id,
            "phone" => $request->phone,
            "address" => $request->address
        ]);

        if($user->save() || $userInformation->save()){
            Auth::login($user);
            return redirect()->route("dashboard")->with("success", "Başarıyla Kayıt Olundu");
        }
        return redirect()->back()->with("error", "Kayıt Olurken Bir Hata Oluştu");
    }

    public function forgetPassword(){
        return view("auth.forgetPassword");
    }

    public function forgetPasswordPost(Request $request){
        $request->validate([
            "email" => ["required", "email", "unique:users"],
            "password" => ["required", "min:8"],
            "password_verify" => ["required", "same:password"],
        ]);

        $user = User::where("email", $request->email)->first();

        if(!$user) 
            return redirect()->back()->with("error", "Kullanıcı Bulunamadı");

        if($request->password === $request->password_verifly){
            $user->password = Hash::make($request->password);

            if($user->save())
                return redirect()->route("login")->with("success", "Şifre Başarıyla Güncellenmiştir.");

            return redirect()->back()->with("error", "Şifre Güncellenirken Bir Hata Oluştu");
        }
        return redirect()->back()->with("error", "Şifreler Eşleşmiyor");
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route("login");
    }

}

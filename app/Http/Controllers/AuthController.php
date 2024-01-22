<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Contact;

class AuthController extends Controller
{
    //
    public function login()
    {
            $listContact = Contact::all();
            return view("auth.login", compact('listContact'));
    }

    public function loginController(Request $request): RedirectResponse {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register(Request $request) {
        if($request->method() == 'GET') {
            $listContact = Contact::all();
            return view('auth.register', compact('listContact'));
        }
        else if($request->method() == 'POST') {
            $name = $request->name;
            $surname = $request->surname;
            $email = $request->email;
            $password = bcrypt($request->password);
            $access = $request->onay;
            $rol = 0;
            //Kontrol sağla
            $validated = $request->validate([
                'email' => 'required|unique:users|email',
            ]);
            if(isset($access)) {
                Users::create([
                    "name" => $name,
                    "surname" => $surname,
                    "email" => $email,
                    "password" => $password,
                    "rol" => $rol,
                ]);
                return redirect(route('register-page'))->with('register', 'Kayıt başarılı');
            }else {
                return redirect()->back()->with('access', 'Lütfen şartlar ve gizlilik kurallarını okuduğunuzu onaylayın!');
            }
        }
    }
    public function logout() {
        auth()->logout();
        return redirect(route('home-page'))->with('logout', 'Başarılı bir şekilde çıkış yapıldı.');
    }



}

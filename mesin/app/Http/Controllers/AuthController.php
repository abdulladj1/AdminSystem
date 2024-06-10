<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
        public function showRegisterForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        // Validasi dll
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('login.form');
    }
    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home'); // arahkan ke dashboard
        } else {
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.form');
    }
}

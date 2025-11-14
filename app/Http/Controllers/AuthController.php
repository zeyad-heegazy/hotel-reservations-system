<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\View\View;

class AuthController extends Controller
{
    public function showLogin(): View
    {
        return view('auth.login');
    }

    public function showRegister(): View
    {
        return view('auth.register');
    }

    public function login(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }

        return back()->withErrors(["email" => "Invalid credentials"]);
    }

    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required|min:6"
        ]);

        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect('/login')->with("success", "Registered successfully. Please log in.");
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/login');
    }
}

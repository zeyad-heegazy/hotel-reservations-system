<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\LogoutRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Http\RedirectResponse;
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

    public function login(LoginRequest $request): RedirectResponse
    {
        $credentials = $request->sanitized();

        if (!Auth::attempt($credentials)) {
            return back()->withErrors(["email" => "Invalid credentials"])
                ->withInput();
        }

        $request->session()->regenerate();

        $token = Auth::user()->createToken('web_token')->plainTextToken;

        session(['api_token' => $token]);

        return redirect('/dashboard');
    }

    /**
     * Handle registration
     */
    public function register(RegisterRequest $request): RedirectResponse
    {
        $data = $request->sanitized();

        User::create([
            "name"     => $data["name"],
            "email"    => $data["email"],
            "password" => bcrypt($data["password"]),
        ]);

        return redirect('/login')->with("success", "Registered successfully! Please log in.");
    }

    /**
     * Logout user
     */
    public function logout(LogoutRequest $request): RedirectResponse
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

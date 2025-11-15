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
    public function register(Request $request): RedirectResponse
    {
        $data = $request->validate([
            "name" => "required|string|max:255",
            "email" => "required|email|unique:users,email",
            "password" => "required|min:6"
        ]);

        $user = User::create([
            "name"     => $data["name"],
            "email"    => $data["email"],
            "password" => bcrypt($data["password"]),
        ]);

        return redirect('/login')->with("success", "Registered successfully! Please log in.");
    }

    /**
     * Logout user
     */
    public function logout(Request $request): RedirectResponse
    {
        if ($request->user()) {
            $request->user()->tokens()->delete();
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

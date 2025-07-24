<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $data = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email:filter|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create($data);
        Auth::login($user);

        return redirect()->route('dashboard');

    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|string|email:filter',
            'password' => 'required|string|min:8',
        ]);
        if (Auth::attempt($credentials, $request->boolean('remember_me'))) {
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('loginForm')->with('status', 'You have been logged out successfully.');
    }
}

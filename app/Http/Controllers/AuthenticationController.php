<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(){
        $title = 'Halaman Login';
        return view('auth.login', [
            'title' => $title
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return back()->withErrors([
                'username' => 'Your provided credentials do not match in our records.',
            ]);
        }

        if(auth()->user()->role === 'admin'){
            return redirect()->intended('/dashboard');
        }else{
            return redirect()->intended('/');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login')
            ->withSuccess('You have logged out successfully!');
    }
}

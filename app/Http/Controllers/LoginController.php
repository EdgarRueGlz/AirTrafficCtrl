<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /* Login view display */
    public function login() {
        if(Auth::check()){
            return redirect()->intended('/');
        }else {
            return view('auth.login');
        }
    }

    /* Handdle auth request */
    public function authenticate(Request $request) {
        
        $credential = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);
        if (Auth::attempt($credential)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Los datos proporcionados no coinciden con los registros.'
        ]);
    }

    /* Main view redirect */
    public function dashboard() {
        
        if (Auth::check()) {
            return view('dashboard');
        }

        return redirect('login')->withSuccess('No puedes acceder a este contenido');
    }

    /* Logout and reset credentials */
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

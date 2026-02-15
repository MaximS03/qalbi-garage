<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConnexionController extends Controller
{
    public function connexion()
    {
        return view('connexion');
    }

    public function login(Request $request)
    {
        // Validation simple
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Authentification
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('welcome');
        } else {
            return back()->withErrors(['email' => 'Identifiants invalides']);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InscriptionController extends Controller
{
    public function inscription()
    {
        return view('inscription');
    }

    public function register(Request $request)
    {
        // Validation simple
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // Création utilisateur
        $user = \App\Models\User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        // Connexion automatique
        Auth::login($user);
        return redirect()->route('welcome');
    }
}

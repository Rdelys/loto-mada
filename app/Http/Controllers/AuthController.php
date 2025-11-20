<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showAuthPage()
    {
        return view('login');
    }

    public function register(Request $request)
    {
        $request->validate([
            'pseudo' => 'required|unique:users',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email|unique:users',
            'telephone' => 'required|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = User::create([
            'pseudo' => $request->pseudo,
            'nom'    => $request->nom,
            'prenom' => $request->prenom,
            'email'  => $request->email,
            'telephone' => $request->telephone,
            'password' => Hash::make($request->password),
            'solde' => null,
        ]);

        Auth::login($user);

        return redirect()->route('home');
    }

    public function login(Request $request)
    {
        $request->validate([
            'login' => 'required',
            'password' => 'required'
        ]);

        // Login avec pseudo OU email
        $field = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'pseudo';

        if (Auth::attempt([$field => $request->login, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        return back()->withErrors(['login' => 'Identifiants incorrects']);
    }

    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('home')->with('success', 'Déconnecté avec succès.');
}


}

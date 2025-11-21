<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserTicket;


class ProfileController extends Controller
{

   public function index()
{
    $user = auth()->user();

    $tickets = $user->tickets()->orderBy('created_at', 'desc')->get();
    $withdrawals = $user->withdrawals()->orderBy('created_at', 'desc')->get();

    // 🔥 Nouveau : solde réellement disponible après retraits en attente
    $pending = $user->withdrawals()
                    ->where('status', 'pending')
                    ->sum('amount');

    $solde_retrait_disponible = $user->solde - $pending;
    if ($solde_retrait_disponible < 0) {
        $solde_retrait_disponible = 0;
    }

    return view('profile', compact(
        'user',
        'tickets',
        'withdrawals',
        'solde_retrait_disponible'
    ));
}



    public function updateProfile(Request $request)
    {
        $request->validate([
            'pseudo' => 'required',
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required|email',
            'telephone' => 'required',
        ]);

        $user = Auth::user();

        $user->update([
            'pseudo' => $request->pseudo,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'email' => $request->email,
            'telephone' => $request->telephone,
        ]);

        return back()->with('success', 'Profil mis à jour avec succès.');
    }

    public function addFunds(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:100'
        ]);

        $user = Auth::user();

        // 🔥 AJOUTE au solde existant dans users.solde
        $user->solde = ($user->solde ?? 0) + $request->amount;
        $user->save();

        return back()->with('success', 'Solde ajouté avec succès !');
    }
}

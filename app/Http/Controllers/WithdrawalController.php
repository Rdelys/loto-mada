<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Withdrawal;
use Illuminate\Support\Facades\Auth;

class WithdrawalController extends Controller
{
    public function requestWithdrawal(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'amount' => 'required|integer|min:100',
            'method' => 'nullable|string|max:60',
            'method_details' => 'nullable|string|max:1000',
        ]);

        $amount = (int) $request->amount;

        // vérifier solde de retrait disponible
        if ($amount > $user->argent_gagnee) {
            return redirect()->back()->with('error', 'Montant supérieur à votre argent gagnée.');
        }

        // ❗ ON NE DÉDUIT PAS LE SOLDE ICI
        // ❗ ON NE TOUCHE PAS À argent_gagnee
        // Tu vas gérer ça plus tard côté admin

        Withdrawal::create([
            'user_id' => $user->id,
            'amount' => $amount,
            'status' => 'pending', // en attente
            'method' => $request->method,
            'method_details' => $request->method_details,
        ]);

        return redirect()->back()->with('success', 'Demande de retrait enregistrée (En attente)');
    }


    public function cancel(Request $request, Withdrawal $withdrawal)
    {
        $user = Auth::user();

        if ($withdrawal->user_id !== $user->id) {
            abort(403);
        }

        if ($withdrawal->status !== 'pending') {
            return redirect()->back()->with('error', 'Impossible d’annuler un retrait déjà traité.');
        }

        // ❗ Comme on n'avait rien déduit, on ne remet rien
        $withdrawal->status = 'cancelled';
        $withdrawal->save();

        return redirect()->back()->with('success', 'Demande de retrait annulée.');
    }

    public function adminValidate(Withdrawal $withdrawal)
{
    if ($withdrawal->status !== 'pending') {
        return back()->with('error', 'Déjà traité.');
    }

    $user = $withdrawal->user;

    // 🔥 Déduire de argent_gagnee
    if ($user->argent_gagnee >= $withdrawal->amount) {
        $user->argent_gagnee -= $withdrawal->amount;
    }

    $user->save();

    // 🔥 Valider
    $withdrawal->status = "termine";
    $withdrawal->save();

    return back()->with('success', 'Retrait validé avec succès.');
}

}

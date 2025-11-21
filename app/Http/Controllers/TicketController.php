<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserTicket;
use App\Models\Jackpot;

class TicketController extends Controller
{
    public function store(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['error' => 'Non authentifié'], 403);
        }

        $request->validate([
            'numbers' => 'required|array|size:5',
            'bonus' => 'required',
            'jackpot_id' => 'nullable|exists:jackpots,id'
        ]);

        $user = Auth::user();

        if (($user->solde ?? 0) < 2000) {
            return response()->json(['error' => 'Solde insuffisant'], 400);
        }

        // Déduire le prix du ticket
        $user->solde -= 2000;
        $user->save();

        // Création du ticket
        $ticket = UserTicket::create([
            'user_id'     => $user->id,
            'jackpot_id'  => $request->jackpot_id,
            'numbers'     => $request->numbers, // <-- plus de json_encode()
            'bonus'       => $request->bonus,
            'status'      => 'Jouer'
        ]);


        return response()->json([
            'success' => true,
            'id'      => $ticket->id,
            'status'  => 'Jouer'
        ]);
    }
}

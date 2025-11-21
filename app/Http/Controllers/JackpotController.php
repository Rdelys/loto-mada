<?php

namespace App\Http\Controllers;

use App\Models\Jackpot;
use Illuminate\Http\Request;
use App\Models\UserTicket;

class JackpotController extends Controller
{
    public function index()
    {
        $jackpots = Jackpot::orderBy('id', 'desc')->get();
        $jackpot_actif = Jackpot::where('status', 'Lancer')->first();
        $jackpots_termine = Jackpot::where('status', 'Terminer')->count();
        $jackpots_planifier = Jackpot::where('status', 'A planifier')->count();
        $user_tickets = UserTicket::with('user')->orderBy('created_at','desc')->get();

        return view('admin.dashboard', compact(
            'jackpots',
            'jackpot_actif',
            'jackpots_termine',
            'jackpots_planifier',
            'user_tickets'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin'   => 'required|date|after_or_equal:date_debut',
            'somme'      => 'required|numeric|min:1',
            'status'     => 'required|in:A planifier,Lancer,Terminer',
        ]);

        Jackpot::create($request->all());

        return back()->with('success', 'Jackpot ajouté.');
    }

    public function update(Request $request, Jackpot $jackpot)
    {
        $request->validate([
            'date_debut' => 'required|date',
            'date_fin'   => 'required|date|after_or_equal:date_debut',
            'somme'      => 'required|numeric|min:1',
            'status'     => 'required|in:A planifier,Lancer,Terminer',
        ]);

        $jackpot->update($request->all());

        return back()->with('success', 'Jackpot modifié.');
    }

    public function destroy(Jackpot $jackpot)
    {
        $jackpot->delete();
        return back()->with('success', 'Jackpot supprimé.');
    }
}

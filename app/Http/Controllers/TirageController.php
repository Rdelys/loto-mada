<?php

namespace App\Http\Controllers;

use App\Models\UserTicket;
use App\Models\Jackpot;
use App\Models\Tirage;
use Illuminate\Http\Request;

class TirageController extends Controller
{
    public function generer()
    {
        try {

            // 1️⃣ Jackpot actif
            $jackpot = Jackpot::where('status', 'Lancer')->first();
            if (!$jackpot) {
                return response()->json(['error' => 'Aucun jackpot actif'], 400);
            }

            // 2️⃣ Récupérer les 20 derniers tirages
            $last20 = Tirage::orderBy('id', 'desc')->take(20)->get();

            $avoidNumbers = [];

            foreach ($last20 as $t) {

                // sécurité : convertir en array
                $nums = is_array($t->numbers) ? $t->numbers : json_decode($t->numbers, true);

                if (!$nums) continue;

                foreach ($nums as $n) {
                    if (!isset($avoidNumbers[$n])) $avoidNumbers[$n] = 0;
                    $avoidNumbers[$n]++;
                }
            }

            // 3️⃣ Tirage optimisé
            $numbers = [];
            while (count($numbers) < 5) {
                $num = rand(1, 49);

                if (in_array($num, $numbers)) continue;
                if (isset($avoidNumbers[$num]) && $avoidNumbers[$num] > 3) continue;

                $numbers[] = $num;
            }

            sort($numbers);

            // Bonus
            $bonus = rand(1, 10);

            // 4️⃣ Vérifier les tickets
            $winner = null;

            $tickets = UserTicket::where('jackpot_id', $jackpot->id)->get();

            foreach ($tickets as $t) {

                $numsTicket = is_array($t->numbers) ? $t->numbers : json_decode($t->numbers, true);

                if (!$numsTicket) $numsTicket = [];

                $match = count(array_intersect($numsTicket, $numbers));
                $bonusMatch = ($t->bonus == $bonus);

                if ($match == 5 && $bonusMatch) {
                    $winner = $t->user_id;
                    $t->status = "Gagné";
                } else {
                    $t->status = "Perdu";
                }
                $t->save();
            }

            // 5️⃣ Enregistrer tirage
            $tirage = Tirage::create([
                'numbers' => $numbers,
                'bonus' => $bonus,
                'winner_id' => $winner,
                'jackpot_id' => $jackpot->id,
                'jackpot_somme' => $jackpot->somme
            ]);

            // 6️⃣ Donner gains si gagnant
            if ($winner) {
                $user = $tirage->winner; // relation winner doit exister sur Tirage -> belongsTo(User::class, 'winner_id')
                if ($user) {
                    // incrementer le solde
                    $user->solde += $jackpot->somme;

                    // incrementer la colonne argent_gagnee
                    $user->argent_gagnee += $jackpot->somme;

                    $user->save();
                }
            }


            // 7️⃣ Jackpot terminé
            $jackpot->status = "Terminer";
            $jackpot->save();

            return response()->json([
                'success' => true,
                'numbers' => $numbers,
                'bonus' => $bonus,
                'winner_id' => $winner,
                'tirage_id' => $tirage->id
            ]);

        } catch (\Exception $e) {

            return response()->json([
                'error' => 'Erreur serveur : '.$e->getMessage()
            ], 500);
        }
    }
}

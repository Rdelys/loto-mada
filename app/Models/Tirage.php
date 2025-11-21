<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tirage extends Model
{
    protected $fillable = [
        'numbers',
        'bonus',
        'winner_id',
        'jackpot_id',
        'jackpot_somme'
    ];

    protected $casts = [
        'numbers' => 'array'
    ];

    public function winner() {
        return $this->belongsTo(User::class, 'winner_id');
    }

    public function jackpot() {
        return $this->belongsTo(Jackpot::class);
    }
}


<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserTicket extends Model
{
    protected $fillable = [
        'user_id',
        'jackpot_id',
        'numbers',
        'bonus',
        'status'
    ];

    protected $casts = [
        'numbers' => 'array'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function jackpot(){
        return $this->belongsTo(Jackpot::class);
    }
}

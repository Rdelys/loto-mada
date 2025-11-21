<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jackpot extends Model
{
    protected $fillable = [
        'date_debut',
        'date_fin',
        'somme',
        'status',
    ];
}


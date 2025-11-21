<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'pseudo',
        'nom',
        'prenom',
        'email',
        'telephone',
        'password',
        'solde',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // 🔥 Relation à ajouter
    public function tickets()
    {
        return $this->hasMany(\App\Models\UserTicket::class);
    }
}

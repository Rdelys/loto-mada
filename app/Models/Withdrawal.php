<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Withdrawal extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'method',
        'method_details',
        'admin_note',
    ];

    // relation vers user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

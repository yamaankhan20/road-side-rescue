<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject; // Import JWTSubject

class Card extends Model implements JWTSubject // Implement the JWTSubject interface
{
    use HasFactory;

    protected $table = 'cards';
    protected $fillable = [
        'user_id',
        'card_number',
        'card_holder_name',
        'expiry_date',
        'cvv',
        'Card_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [
            'card_number' => $this->card_number
        ];
    }
}

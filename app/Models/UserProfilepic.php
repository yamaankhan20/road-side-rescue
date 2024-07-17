<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfilepic extends Model
{
    use HasFactory;
    protected $table = 'user_profile_pic';
    protected $fillable = [
        "user_id",
        "profile_pic"
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

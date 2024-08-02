<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NotificationCenter extends Model
{
    use HasFactory;

    protected $table = 'notification_center';
    protected $fillable = [
        'category_id',
        'service_id',
        "sender_id",
        "receiver_id",
        "message",
        'status',
        'seen',
        'All_count'
    ];

    public function notifications(){

        return $this->hasMany(User::class);
    }
}

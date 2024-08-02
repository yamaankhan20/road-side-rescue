<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VendorStatus extends Model
{
    use HasFactory;

    protected $table = 'vendor_status';

    protected $fillable = [
        'vendor_id',
        'status',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

}

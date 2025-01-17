<?php

// app/Models/Service.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected  $table = "services";
    protected $fillable = ['id', 'category_id', 'name', 'description', 'price', 'vendor_id', 'location'];

    public function category()
    {
         return $this->belongsTo(Category::class);
    }
    public function vendor_all() {
        return $this->hasMany(User::class, 'id', 'vendor_id'); // Update this if needed
    }
}

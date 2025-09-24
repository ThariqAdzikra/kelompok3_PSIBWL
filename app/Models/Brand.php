<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi: satu brand punya banyak laptop
    public function laptops()
    {
        return $this->hasMany(Laptop::class);
    }
}

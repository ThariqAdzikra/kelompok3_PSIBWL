<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laptop extends Model
{
    use HasFactory;

    protected $fillable = [
        'brand_id',
        'category_id',
        'model',
        'cpu',
        'gpu',
        'ram_gb',
        'storage_gb',
        'storage_type',
        'screen_size',
        'resolution',
        'price',
        'os',
        'stock',
        'image_path',
        'notes',
    ];

    // Relasi: laptop milik satu brand
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    // Relasi: laptop milik satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}

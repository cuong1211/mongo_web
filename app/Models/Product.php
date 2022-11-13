<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'img',
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function in_products()
    {
        return $this->hasMany(in_product::class);
    }
}

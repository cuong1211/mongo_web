<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function product()
    {
        return $this->hasMany(Product::class);
    }
}

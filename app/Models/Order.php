<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'address',
        'phone',
        'note',
        'product_id',
        'quantity',
        'total',
        'date',
        'status',
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'orderId',
        'name',
        'description',
        'price',
    ];
    protected $dates = ['created_at', 'updated_at'];
}

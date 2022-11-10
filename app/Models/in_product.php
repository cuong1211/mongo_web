<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class in_product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'quantity',
        'product_id',
        'company_id',
    ];
    protected $dates = ['created_at', 'updated_at'];
    public function product()
    {
        return $this->belongsTo(product::class, 'product_id');
    }
    public function company()
    {
        return $this->belongsTo(company::class, 'company_id');
    }
}

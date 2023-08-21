<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'code',
        'applies',
        'type',
        'value',
        'max_value',
        'description',
        'date_created',
        'date_expires',
        'quantity',
        'status',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }
}

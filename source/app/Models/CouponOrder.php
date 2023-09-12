<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CouponOrder extends Model
{
    protected $fillable = [
    'order_id',
    'code',
    'discount_amount'];
}

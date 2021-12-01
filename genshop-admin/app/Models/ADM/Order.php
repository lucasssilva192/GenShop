<?php

namespace App\Models\ADM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['costumer_id', 'store_id', 'address', 'price', 'status'];
}

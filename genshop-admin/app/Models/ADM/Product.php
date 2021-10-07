<?php

namespace App\Models\ADM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['store_id', 'name', 'price', 'description', 'picture'];
}

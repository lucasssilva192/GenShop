<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['customer_id', 'name', 'cep', 'state', 'city', 'address', 'number', 'complement', 'main'];
}

<?php

namespace App\Models\API;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'cnpj', 'cellphone', 'telephone', 'profile_pic', 'address'];
}

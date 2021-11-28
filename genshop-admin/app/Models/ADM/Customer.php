<?php

namespace App\Models\ADM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'first_name', 'last_name', 'birth_date', 'cpf', 'cellphone', 'telephone', 'profile_pic'];
}

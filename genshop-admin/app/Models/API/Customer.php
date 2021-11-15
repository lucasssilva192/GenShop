<?php

namespace App\Models\API;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'first_name', 'last_name', 'birth_date', 'cpf', 'cellphone', 'telephone', 'profile_pic'];

    public static function custumerID(string $userID) {
        return Customer::where('user_id', $userID)->first()->id;
    }
}

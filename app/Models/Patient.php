<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'phone_number', 'gender', 'date_birthday', 'cpf'
    ];


    protected $dates = [
        'born_at' => 'date:Y-m-d'
    ];
}

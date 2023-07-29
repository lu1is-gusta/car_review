<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\car;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'gender', 'date_of_birth', 'address', 'email', 'telephone'
    ];

    // Relacionamento: Um proprietário pode ter vários carros
    public function car()
    {
        return $this->hasMany(Car::class);
    }
}

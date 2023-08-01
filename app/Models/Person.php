<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\car;

class Person extends Model
{
    use HasFactory;

    protected $table = 'persons';

    protected $fillable = [
        'name', 'gender', 'date_of_birth', 'address', 'email', 'telephone', 'created_at', 'updated_at'
    ];

    public function car()
    {
        return $this->hasMany(Car::class);
    }
}

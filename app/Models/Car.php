<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\Person;
use App\Model\Review;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'person_id', 'model', 'brand', 'year', 'plate', 'color'
    ];

    // Relacionamento: Um carro pertence a um proprietário
    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    // Relacionamento: Um carro pode ter várias revisões
    public function review()
    {
        return $this->hasMany(Review::class);
    }
}

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
        'person_id', 'model', 'brand', 'year', 'plate', 'color', 'created_at', 'updated_at'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }
}

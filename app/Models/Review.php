<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Model\car;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
        'car_id', 'revision_date', 'description', 'mileage', 'value', 'created_at', 'updated_at'
    ];

    public function car()
    {
        return $this->belongsTo(car::class);
    }
}

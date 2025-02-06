<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = ['unique_number', 'brand', 'model'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}

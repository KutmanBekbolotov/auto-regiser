<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    use HasFactory;

    protected $fillable = ['full_name'];

    public function registrations()
    {
        return $this->hasMany(Registration::class);
    }
}

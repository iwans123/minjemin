<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fuel extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function Fuel()
    {
        return $this->hasMany(Fuel::class);
    }

    public function Service()
    {
        return $this->hasMany(Service::class);
    }
}

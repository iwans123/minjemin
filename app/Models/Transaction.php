<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function Employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function Vehicle()
    {
        return $this->belongsTo(Vehicle::class);
    }

    public function userLow()
    {
        return $this->belongsTo(User::class, 'userLow_id');
    }

    public function userHigh()
    {
        return $this->belongsTo(User::class, 'userHigh_id');
    }
}

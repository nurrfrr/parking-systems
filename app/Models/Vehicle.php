<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'plate_number',
        'vehicle_type',
    ];

    public function logs(){
        return $this->hasMany(ParkingLog::class);
    }
}

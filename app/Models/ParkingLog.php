<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ParkingLog extends Model
{
    protected $fillable = [
        'vehicle_id',
        'parking_code',
        'entry_time',
        'exit_time',
        'status',
    ];

    protected $casts = [
        'entry_time' => 'datetime',
        'exit_time' => 'datetime',
    ];

    public function vehicle(){
        return $this->belongsTo(Vehicle::class);
    }

    public function calculateFee(){
        if (!$this->exit_time) return 0;

        $hours = $this->entry_time->diffInHours($this->exit_time);
        return $hours * 3000;
    }
}

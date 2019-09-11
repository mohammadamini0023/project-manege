<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceVehicle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'inv', 'service_id', 'vehicle_id', 'current_miles',
    ];

    public function service() {
        return $this->belongsTo('App\Models\Service', 'service_id')->first();
    }

    public function vehicle() {
        return $this->belongsTo('App\Models\Vehicle', 'vehicle_id')->first();
    }
}

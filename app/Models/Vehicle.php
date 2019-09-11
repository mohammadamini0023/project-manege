<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'vin_number', 'make',
        'model', 'number_plates', 'color', 'year'
    ];

    public function user() {
        return $this->belongsTo('App\Models\User', 'user_id')->first();
    }

    public function users() {
        return $this->belongsTo('App\Models\User', 'user_id')->get();
    }

    public function service_vehicle() {
        return $this->hasMany('App\Models\ServiceVehicle', 'vehicle_id')->get();
    }
}

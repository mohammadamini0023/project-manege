<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'duration', 'miles', 'price'
    ];

    public function service_vehicle() {
        return $this->hasMany('App\Models\ServiceVehicle', 'service_id')->get();
    }
}

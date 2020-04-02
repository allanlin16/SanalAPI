<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{

    protected  $fillable = [
        'building_name',
        'building_address',
        'building_city',
        'building_postalcode',
        'client_id',
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function extinguisher() {
        return $this->hasMany(Extinguisher::class);
    }

}

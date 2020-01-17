<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    //

    protected  $fillable = [
        'building_name',
        'building_address',
        'building_city',
        'building_postalcode',
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extinguisher extends Model
{
    protected  $fillable = [

        'extinguisher_make',
        'extinguisher_serialnumber',
        'extinguisher_barcodenumber',
        'extinguisher_locationarea',
        'extinguisher_locationdescription',
        'extinguisher_type',
        'extinguisher_rating',
        'extinguisher_size',
        'extinguisher_manufacturedate',
        'extinguisher_htestdate',
        'extinguisher_servicedate',
        'extinguisher_nextservicedate',
        'extinguisher_comment',
        'extinguisher_status'


    ];
}

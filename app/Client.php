<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected  $fillable = [
        'client_name',
        'client_phone',
        'client_address',
        'client_email',
    ];

    public function building() {
        return $this->hasMany(Building::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

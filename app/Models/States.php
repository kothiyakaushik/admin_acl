<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
    protected $fillable = [
        'id','name','status','user_id', 'country_id'
    ];


    public function stateCountry()
    {
        return $this->belongsTo('\App\Models\Country','country_id','id');
    }

    public function stateCity() {
        return $this->hasOne('\App\Models\Cities', 'state_id', 'id');
    }
}

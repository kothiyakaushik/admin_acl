<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
    protected $fillable = [
        'id','name','status','user_id', 'state_id'
    ];

    public function cityState()
    {
        return $this->belongsTo('\App\Models\States','state_id','id');
    }
}

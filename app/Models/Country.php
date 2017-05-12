<?php
namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Country extends Model

{
    public $fillable = ['name','user_id'];

    public function countryState() {
        return $this->hasOne('\App\Models\States', 'country_id', 'id');
    }
}
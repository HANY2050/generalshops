<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = 'states';
    protected $primaryKey = 'id';

    public function cites(){

        return $this->hasMany(City::class,'state_id','id');


    }
    public function country(){

        return $this->belongsTo(Country::class,'country_id','id');


    }
}

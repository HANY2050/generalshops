<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [

        'cart_items',
        'total',




    ];

    public function user(){
     return $this->belongsTo(User::class);

    }
    public  function order(){

        return $this->belongsTo(Order::class);
    }
    public function cartitems(){


    }
    public function inItems($product_id){

    }
}

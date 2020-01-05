<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
		'total', 'pay', 'change_money'
	];

    public function customer(){
         return $this->belongsTo(Customer::class);
   }
   
   public function order(){
         return $this->belongsTo(Order::class);
   }
   
}

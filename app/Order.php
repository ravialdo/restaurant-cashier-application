<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
		'menu_id', 'amount', 'user_id', 'status'
	];
	
	public function menu(){
		return $this->belongsTo(Menu::class);
	}
	
	public function customer(){
		return $this->belongsTo(Customer::class);
	}

     /**
	* Method One to One Order  > Transaction
	*
	* @return void
	*/

     public function transaction(){
          return $this->hasOne(Transaction::class);
     }
   
}

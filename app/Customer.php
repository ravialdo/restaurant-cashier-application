<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
		'customer_name', 'table_number', 'gender_id', 'number_phone', 'address'
	];
	
	/**
	* Method One to Many Customer > Orders
	*
	* @return void
	*/
	
	public function order(){
		return $this->hasOne(Order::class);
	}

}

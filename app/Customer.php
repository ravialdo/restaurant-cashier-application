<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
		'customer_name', 'table_number', 'gender', 'number_phone', 'address'
	];
	
	/**
	* Method One to Many Customer > Orders
	*
	* @return void
	*/
	
	public function orders(){
		return $this->hasMany(Order::class);
	}

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
		'name_menu', 'price'
	];
	
	/**
	* Method One to One Customer > Orders
	*
	* @return void
	*/
	
	public function orders(){
		return $this->hasMany(Order::class);
	}

      /**
	* Method One to One Customer > Transaction
	*
	* @return void
	*/
	
	public function transactions(){
		return $this->hasMany(Transaction::class);
	}
	
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
		'name_menu', 'image_menu', 'price'
	];
	
	/**
	* Method One to Many Menu > Orders
	*
	* @return void
	*/
	
	public function orders(){
		return $this->hasMany(Order::class);
	}
	
}

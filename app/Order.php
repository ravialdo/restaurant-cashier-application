<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
		'menu_id', 'customer_id', 'amount', 'status'
	];
	
	public function menu(){
		return $this->belongsTo(Menu::class);
	}
	
	public function customer(){
		return $this->belongsTo(Customer::class);
	}
}

<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposits extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['deposit_id', 'wallet', 'amount', 'status'];

}

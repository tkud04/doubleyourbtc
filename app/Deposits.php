<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposits extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['deposit_id', 'email', 'wallet', 'amount', 'status', 'status_number'];

}

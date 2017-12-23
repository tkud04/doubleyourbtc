<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Payouts extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['payout_id', 'email', 'wallet', 'amount', 'status'];

}

<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Address extends Model {

	/**
	 * @var string
	 */
	protected $table = 'user_addresses';

	/**
	 * @var array
	 */
	protected $fillable = [
		'user_id',
		'app_id',
		'realname',
		'phone',
		'province',
		'city',
		'area',
		'address',
		'zipcode',
		'isdefault',
		'type',
	];

	/**
	 * @var array
	 */
	protected $dates = ['deleted_at'];

}

<?php

namespace App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model {
	protected $table = 'user_payments';
	/**
	 * @var array
	 */
	protected $fieldSearchable = [
		'out_trade_no' => 'like',
		'transaction_id' => 'like',
		'user_id',
		'type',
		'status',
		'created_at',
	];

	/**
	 * Specify Model class name.
	 *
	 * @return string
	 */
	public function model() {
		return Payment::class;
	}
	public function user() {
		return $this->belongsTo('App\Models\User')->withDefault(null);
	}

}

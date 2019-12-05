<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class OrderGoods extends Model {
	/**
	 * @var string
	 */
	protected $table = 'shop_order_goods';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * 商品
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function goods() {
		return $this->belongsTo('App\Models\Shop\Goods')->withDefault(null);
	}

	/**
	 * 商品规格ERP
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function option() {
		return $this->belongsTo('App\Models\Shop\GoodsOptions', 'option_id');
	}
	/**
	 * 所属用户.
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo('App\Models\User')->withDefault(null);
	}
	/**
	 * 所属代理.
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function agent() {
		return $this->belongsTo('App\Models\User', 'agent_id')->withDefault(null);
	}
	/**
	 * @var array
	 */
	protected $hidden = [
		'order_id',
		'user_id',
		'merch_id',
		'agent_id',
	];
}

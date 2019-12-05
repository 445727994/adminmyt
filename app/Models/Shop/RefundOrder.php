<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class RefundOrder extends Model {

	/**
	 * 自动格式转换.
	 * @var array
	 */
	protected $casts = [
		'image' => 'array',
	];
	/**
	 * @var string
	 */
	protected $table = 'shop_refund_orders';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [];

	/**
	 * @var array
	 */
	protected $hidden = [
		'app_id',
		'merch_id',
		'user_id',
		'order_goods_id',
	];

	/**
	 * 所属商品
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function goods() {
		return $this->belongsTo('App\Models\Shop\OrderGoods', 'order_goods_id')->withDefault(null);
	}

	/**
	 * 所属订单.
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function order() {
		return $this->belongsTo('App\Models\Shop\Order', 'order_id')->withDefault(null);
	}

	/**
	 * 所属用户.
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo('App\Models\User')->withDefault(null);
	}

	/**
	 * 退货换货地址
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function address() {
		return $this->belongsTo('App\Models\User\Address', 'refund_address_id')->withDefault(null);
	}

}

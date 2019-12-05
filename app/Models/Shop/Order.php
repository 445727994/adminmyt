<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	/**
	 * @var string
	 */
	protected $table = 'shop_orders';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = [
		'subOrders',
		'coord',
		'cart',
	];

	/**
	 * @var array
	 */
	protected $hidden = [
		'address_id',
		'user_id',
		'merch_id',
		'agent_id',
	];
	// public function setAddressAttribute($image) {
	// 	if (is_array($image)) {
	// 		$this->attributes['images'] = json_encode($image);
	// 	}
	// }
	public function getAddressAttribute($addr) {
		$addr = json_decode($addr, true);
		return "收货人：" . $addr['realname'] . "   电话：" . $addr['phone'] . '  地址：' . $addr['province'] . $addr['city'] . $addr['area'] . $addr['address'] . '  邮编：' . $addr['zipcode'];
	}

	/**
	 * 子订单.
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function subOrders() {
		return $this->hasMany('App\Models\Shop\OrderGoods', 'order_id');
	}

	/**
	 * 商品
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
//    public function goods()
	//    {
	//        return $this->belongsTo('App\Models\Shop\Goods')->withDefault(null);
	//    }
	/**
	 * 所属用户.
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function user() {
		return $this->belongsTo('App\Models\User')->withDefault(null);
	}

	/**
	 * 订单对应的收货地址
	 * @return bool|\Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function userAddress() {
		return $this->belongsTo('App\Models\User\Address', 'address_id')->withDefault(null);
	}
	/**
	 * 订单对应的退款信息
	 * @return bool|\Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function refundOrder() {
		return $this->belongsTo('App\Models\Shop\RefundOrder', 'refundid')->withDefault(null);
	}
}
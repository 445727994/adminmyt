<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model {
	protected $table = 'tbk_coupons';
	protected $fillable = [
		'title',
		'cat',
		'shop_type',
		'pic_url',
		'item_id',
		'item_url',
		'volume',
		'price',
		'final_price',
		'coupon_price',
		'coupon_link',
		'activity_id',
		'commission_rate',
		'introduce',
		'total_num',
		'receive_num',
		'tag',
		'is_recommend',
		'type',
		'status',
		'start_time',
		'end_time',
		'short_title',
		'volume1',
		'volume2',
		'coupon_link',
		'seller_id',
		'shop_name',
		'nick',
		'receive_num',
	];
	public function cate() {
		return $this->belongsTo(Category::class, 'cat');
	}
}

<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model {
	/**
	 * @var string
	 */
	protected $table = 'shop_goods';

	/**
	 * @var array
	 */
	protected $guarded = [
		'user_id',
		'merch_id',
//        'categories', //分类
		'specs', //多规格
		'option', //多规格ERP
		'params', //参数
	];

	/**
	 * @var array
	 */
	// protected $hidden = [
	// 	'user_id',
	// 	'merch_id',
	// 	'cost_price',
	// 	'real_sales',
	// 	'show_sales',
	// 	'show_spec',
	// 	'credit',
	// 	'minbuy',
	// 	'maxbuy',
	// 	'total_maxbuy',
	// 	'isdiscount',
	// 	'discount_title',
	// 	'discount_end',
	// 	'discount_price',
	// 	'issendfree',
	// 	'iscomment',
	// 	'views',
	// 	'hascommission',
	// 	'is_not_discount',
	// 	'deduct_credit1',
	// 	'deduct_credit2',
	// 	'show_total',
	// 	'auto_receive',
	// 	'can_not_refund',
	// 	'type',
	// ];

	/**
	 * @var array
	 */
	protected $dates = ['deleted_at'];
	public function setThumbAttribute($image) {
		if (is_array($image)) {
			$this->attributes['thumb'] = json_encode($image);
		}
	}
	public function getThumbAttribute($image) {
		return json_decode($image, true);
	}
	public function cate() {
		return $this->belongsTo(Category::class, 'category_id');
	}

}

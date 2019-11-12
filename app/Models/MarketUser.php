<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketUser extends Model {
	protected $table = 'plugin_market_user';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'head_img'];
	public static function selectOption($where = [], $add = '顶级分类') {
		return MarketUser::where($where)->pluck('name', 'id');
	}
}

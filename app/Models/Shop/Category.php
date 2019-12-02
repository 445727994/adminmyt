<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	/**
	 * @var string
	 */
	protected $table = 'shop_categories';
	public function cate() {
		return $this->belongsTo(Category::class, 'parentid');
	}
	public static function selectOption($where = [], $add = '顶级分类') {
		$res = Category::where($where)->pluck('name', 'id')->toArray();
		if ($add) {
			$arr[0] = $add;
			foreach ($res as $key => $value) {
				$arr[$key] = $value;
			}
			$res = $arr;
		}
		return $res;
	}
}

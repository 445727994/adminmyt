<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketCate extends Model {

	/**
	 * @var string
	 */
	protected $table = 'plugin_market_cate';
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'pid', 'type', 'sort'];

	protected $hidden = [
		'created_at',
		'updated_at',
	];
	const Name = ['id' => '序号', 'name' => '分类名称', 'pid' => "上级分类", 'type' => '类型', 'sort' => '排序', 'created_at' => '创建时间', 'updated_at' => '更新时间'];
	public function cate() {
		return $this->belongsTo(MarketCate::class, 'pid');
	}
	public static function selectOption($where = [], $add = '顶级分类') {
		$res = MarketCate::where($where)->pluck('name', 'id')->toArray();
		array_unshift($res, $add);
		return $res;
	}
	public function checkPid($value = '') {
		return '错了';
	}
}

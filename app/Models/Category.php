<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {
	protected $table = 'tbk_categories';

	/**
	 * @var array
	 */
	protected $fillable = [
		'name',
		'parent_id',
		'logo',
		'sort',
		'taobao',
		'jingdong',
		'pinduoduo',
		'alimama',
		'status',
	];

	/**
	 * @var array
	 */
	protected $dates = ['deleted_at'];

	/**
	 * 子分类.
	 * @return mixed
	 */
	public function children() {
		return $this->hasMany('App\Models\Taoke\Category', 'parent_id');
	}
}

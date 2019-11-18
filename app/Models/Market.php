<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Market extends Model {

	/**
	 * @var string
	 */
	protected $table = 'plugin_market';

	/**
	 * @var array
	 */
	protected $fillable = [
		'content', 'images', 'type', 'shares', 'copy_text', 'publish_id', 'item_id', 'item_pic', 'item_title', 'cate_id', 'is_jx', 'cate_pid',
	];

	/**
	 * 自动格式转换.
	 * @var array
	 */
	protected $casts = [
		'images' => 'array',
	];
	public function publisher() {
		return $this->hasOne(MarketUser::class, 'id', 'publish_id');
	}
	public function cate() {
		return $this->belongsTo(MarketCate::class, 'cate_id');
	}
	public function publish() {
		return $this->belongsTo(MarketUser::class, 'publish_id');
	}
	public function setImagesAttribute($image) {
		if (is_array($image)) {
			$this->attributes['images'] = json_encode($image);
		}
	}
	public function getImagesAttribute($image) {
		return json_decode($image, true);
	}
	public function getCopyTextAttribute($text) {
		return base64_decode($text);
	}
}

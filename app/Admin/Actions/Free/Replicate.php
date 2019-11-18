<?php

namespace App\Admin\Actions\Free;

use App\Models\Coupon;
use App\Models\Free;
use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class Replicate extends RowAction {
	public $name = '加入公测免单';
	public function handle(Model $model) {
		// $model ...
		$item_id = $model->item_id;
		$good = Coupon::where('item_id', $item_id)->first();
		$goodFree = Free::where('item_id', $item_id)->first();
		if (!$good) {
			return $this->response()->error('商品未找到')->refresh();
		}
		if ($goodFree) {
			return $this->response()->error('商品已经为公测商品')->refresh();
		}
		Free::insert(['item_id' => $item_id, 'is_expire' => 0, 'is_delete' => 0]);
		return $this->response()->success('加入成功  ')->refresh();
	}
	public function dialog() {
		$this->confirm('确定加入？');
	}
}

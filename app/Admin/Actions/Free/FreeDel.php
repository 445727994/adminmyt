<?php

namespace App\Admin\Actions\Free;

use App\Models\Free;
use Encore\Admin\Actions\RowAction;
use Illuminate\Database\Eloquent\Model;

class FreeDel extends RowAction {
	public $name = '删除';

	public function handle(Model $model) {
		// $model ...
		$id = $model->id;
		Free::where("id", $id)->update(['is_delete' => 1]);
		return $this->response()->success('Success message.')->refresh();
	}
	public function dialog() {
		$this->confirm('确定删除？');
	}
}
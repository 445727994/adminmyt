<?php

namespace App\Admin\Controllers;

use App\Models\Free;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FreeController extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = '公测免单';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new Free);
		$grid->model()->where('is_delete', '=', 0);
		$grid->column('id', __('Id'));
		$grid->column('item_id', __('淘宝商品id'));
		$grid->column('sort', __('排序'))->sortable();
		$grid->column('is_expire', __('是否过期'));
		$grid->column('created_at', __('创建时间'));
		$grid->column('updated_at', __('更新时间'));

		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(Free::findOrFail($id));

		$show->field('id', __('Id'));
		$show->field('item_id', __('淘宝商品id'));
		$show->field('sort', __('排序'));
		$show->field('is_expire', __('是否过期'));
		$show->field('created_at', __('创建时间'));
		$show->field('updated_at', __('更新时间'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new Free);

		$form->text('item_id', __('淘宝商品id'));
		$form->number('sort', __('排序'));
		$form->number('is_expire', __('是否过期'));

		return $form;
	}
}

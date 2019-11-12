<?php

namespace App\Admin\Controllers;

use App\Models\MarketUser;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MarketUserController extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = '发布人管理';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new MarketUser);

		$grid->column('id', __('Id'));
		$grid->column('name', __('昵称'));
		$grid->column('head_img', __('头像'));
		$grid->column('created_at', __('Created at'));
		$grid->column('updated_at', __('Updated at'));
		$grid->column('is_default', __('默认'));

		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(MarketUser::findOrFail($id));

		$show->field('id', __('Id'));
		$show->field('name', __('昵称'));
		$show->field('head_img', __('头像'));
		$show->field('created_at', __('Created at'));
		$show->field('updated_at', __('Updated at'));
		$show->field('is_default', __('默认'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new MarketUser);

		$form->text('name', __('昵称'));
		$form->image('head_img', __('头像'))->removable();
		$form->switch('is_default', __('默认用户'))->states(
			[
				'on' => ['value' => 1, 'text' => '是', 'color' => 'success'],
				'off' => ['value' => 0, 'text' => '否', 'color' => 'danger'],
			]
		);
		return $form;
	}
}

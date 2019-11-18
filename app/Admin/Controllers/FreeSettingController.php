<?php

namespace App\Admin\Controllers;

use App\Models\FreeSetting;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FreeSettingController extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = 'App\Models\FreeSetting';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new FreeSetting);
		$grid->disableExport();
		$grid->disableCreation();
		$grid->actions(function ($actions) {
			// 去掉删除
			$actions->disableDelete();
		});
		$grid->tools(function ($tools) {
			$tools->batch(function ($batch) {
				$batch->disableDelete();
			});
		});
		$grid->column('id', __('Id'));
		$grid->column('image', __('图片'));
		$grid->column('content', __('规则内容'));
		$grid->column('updated_at', __('更新日期'));
		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(FreeSetting::findOrFail($id));
		$show->panel()
			->tools(function ($tools) {
				$tools->disableEdit();
				$tools->disableList();
				$tools->disableDelete();
			});
		$show->field('id', __('Id'));
		$form->image('image', __('图片'))->removable();
		$show->field('content', __('规则内容'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {

		$form = new Form(new FreeSetting);
		//表单右上角
		$form->tools(function (Form\Tools $tools) {
			$tools->disableDelete();
			$tools->disableView();
		});

		$form->image('image', __('图片'));
		$form->kindeditor('content', __('规则内容'));
		return $form;
	}
}

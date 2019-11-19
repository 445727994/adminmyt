<?php

namespace App\Admin\Controllers;

use App\Models\Market;
use App\Models\MarketCate;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MarketsSchoolController extends AdminController {
	protected $title = '麦芽学院';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new Market);
		$grid->model()->where('cate_pid', '=', 4);
		$grid->column('id', __('Id'));
		$grid->column('content', __('内容'));
		$grid->column('images', __('图片'))->image('', 100, 100);
		$grid->column('shares', __('分享次数'));
		//$grid->column('type', __('Type'));
		$grid->column('cate.name', __('分类')); //

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
		$show = new Show(Market::findOrFail($id));

		$show->field('id', __('Id'));

		$show->field('images', __('图片'));
		$show->field('shares', __('分享次数'));
		$show->field('created_at', __('创建时间'));
		$show->field('updated_at', __('更新时间'));
		$show->field('type', __('Type'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new Market);

		//  $form->switch('type', __('Type'))->default(1);
		$form->select('cate_id', __('分类'))->options(MarketCate::selectOption(['pid' => 4], false))->help('选择分类')->rules('required', ['required' => '请选择分类']);
		$form->number('shares', __('分享次数'));
		$form->hidden('cate_pid')->default(4);
		$form->Image('images', __('封面图'))->uniqueName()->sortable()->removable();
		$form->kindeditor('content', __('标题'))->help("请勿在内容中上传图片！");
		//$form->number('is_jx', __('Is jx'));

		return $form;
	}
}

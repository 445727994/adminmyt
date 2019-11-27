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
		$grid->model()->where('cate_pid', '=', 6);
		$grid->column('id', __('Id'));
		$grid->column('item_title', __('标题'));
		$grid->column('image', __('封面图'))->image('', 100, 100);
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
		$show->field('image', __('封面图'));
		$show->field('shares', __('分享次数'));
		$show->field('created_at', __('创建时间'));
		$show->field('updated_at', __('更新时间'));
		$show->field('url', __('https网址'));

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
		$form->text("item_title", '标题');
		$form->image('image', __('封面图'))->uniqueName(); //
		$form->select('cate_id', __('分类'))->options(MarketCate::selectOption(['pid' => 6], false))->help('选择分类')->rules('required', ['required' => '请选择分类']);
		$form->text('url', __('https网址'));
		$form->text('content', __('描述'))->help("内容简介！");
		$form->number('shares', __('分享次数'));
		$form->hidden('cate_pid')->default(6);
		//$form->number('is_jx', __('Is jx'));
		return $form;
	}
}

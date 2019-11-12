<?php

namespace App\Admin\Controllers;

use App\Models\MarketCate;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MarketCateController extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = '发圈分类';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new MarketCate);
		$grid->quickSearch(['name']);
		$grid->filter(function ($filter) {
			// 去掉默认的id过滤器
			$filter->disableIdFilter();
			// 在这里添加字段过滤器
			$filter->like('name', 'name');
		});
		$grid->actions(function ($actions) {
			// 去掉删除
			$actions->disableDelete();

		});
		$grid->disableBatchActions();
		$name = MarketCate::Name;
		$grid->column('id', __($name['id']));
		$grid->column('name', __($name['name']));
		$grid->column('cate.name', __($name['pid']));
		$grid->column('type', __($name['type']));
		$grid->column('sort', __($name['sort']));
		$grid->column('created_at', __($name['created_at']));
		$grid->column('updated_at', __($name['updated_at']));
		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(MarketCate::findOrFail($id));
		$name = MarketCate::Name;
		$show->field('id', __($name['id']));
		$show->field('name', __($name['name']));
		$show->field('pid', __($name['pid']));
		$show->field('type', __($name['type']));
		$show->field('sort', __($name['sort']));
		$show->field('created_at', __($name['created_at']));
		$show->field('updated_at', __($name['updated_at']));
		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new MarketCate);
		$name = MarketCate::Name;
		$form->text('name', __($name['name']));
		$form->select('pid', __($name['pid']))->options(MarketCate::selectOption(['pid' => 0]))->help('顶级分类请勿修改上级分类')->rules('required', ['required' => '请选择分类']);
		$form->radio('type', __($name['type']))->options(['0' => '后台获取', '1' => '接口获取'])->default('0');
		$form->number('sort', __($name['sort']));
		$form->saving(function (Form $form) {
			$pid = MarketCate::where('id', $form->model()->id)->value("pid");
			if (($form->model()->pid == 0 || $form->model()->pid == NULL) && $form->id != 0) {
				throw new \Exception('顶级分类不允许修改为二级分类');
			}
		});
		$form->deleting(function (Form $form) {
			if ($form->id < 4) {
				return response()->json([
					'status' => false,
					'message' => '删除失败,接口获取分类不允许后台删除',
				]);
			}

		});
		return $form;
	}
}

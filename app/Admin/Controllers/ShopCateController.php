<?php

namespace App\Admin\Controllers;

use App\Models\Shop\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ShopCateController extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = '分类列表';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new Category);

		$grid->column('id', __('Id'));
		// $grid->column('user_id', __('User id'));
		// $grid->column('app_id', __('App id'));
		$grid->column('cate.name', __('上级分类'));
		$grid->column('name', __('名称'));
		$grid->column('thumb', __('缩略图'));
		$grid->column('description', __('描述'));
		// $grid->column('advimg', __('Advimg'));
		// $grid->column('advurl', __('Advurl'));
		$grid->column('sort', __('排序'));
		$grid->column('status', __('状态'));
		$grid->column('isdefault', __('是否默认'));
		// $grid->column('case', __('Case'));
		// $grid->column('spider_type', __('Spider type'));
		// $grid->column('ishome', __('Ishome'));
		// $grid->column('isrecommand', __('Isrecommand'));
		$grid->column('created_at', __('创建时间'));
		$grid->column('updated_at', __('更新时间'));
		// $grid->column('deleted_at', __('删除时间'));

		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(Category::findOrFail($id));

		$show->field('id', __('Id'));
		// $show->field('user_id', __('User id'));
		// $show->field('app_id', __('App id'));
		$show->field('parentid', __('上级分类'));
		$show->field('name', __('名称'));
		$show->image('thumb', __('缩略图'));
		$show->field('description', __('描述'));
		// $show->field('advimg', __('Advimg'))->image('', 50, 50);;
		// $show->field('advurl', __('Advurl'));
		$show->field('sort', __('排序'));
		$show->field('status', __('状态'));
		$show->field('isdefault', __('是否默认'));
		// $show->field('case', __('Case'));
		// $show->field('spider_type', __('Spider type'));
		// $show->field('ishome', __('Ishome'));
		// $show->field('isrecommand', __('Isrecommand'));
		$show->field('created_at', __('创建时间'));
		$show->field('updated_at', __('更新时间'));
		// $show->field('deleted_at', __('删除时间'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new Category);

		// $form->number('user_id', __('User id'));
		// $form->number('app_id', __('App id'));
		$form->select('parentid', __('上级分类'))->options(Category::selectOption(['parentid' => 0]))->help('顶级分类请勿修改上级分类')->rules('required', ['required' => '请选择分类']);
		$form->text('name', __('名称'));
		$form->image('thumb', __('缩略图'));
		$form->text('description', __('描述'));
		// $form->text('advimg', __('Advimg'));
		// $form->text('advurl', __('Advurl'));
		$form->number('sort', __('排序'))->default(100);
		$form->switch('status', __('状态'))->default(1);
		$form->switch('isdefault', __('是否默认'));
		$form->hidden('user_id')->default(1);
		$form->hidden('app_id')->default(1);
		// $form->text('case', __('Case'));
		// $form->switch('spider_type', __('Spider type'));
		// $form->switch('ishome', __('Ishome'));
		// $form->switch('isrecommand', __('Isrecommand'));

		return $form;
	}
}

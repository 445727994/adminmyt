<?php

namespace App\Admin\Controllers\Shop;

use App\Models\Shop\Category;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CateController extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = 'App\Models\Shop\Category';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new Category);

		$grid->column('id', __('Id'));
		$grid->column('user_id', __('User id'));
		$grid->column('app_id', __('App id'));
		$grid->column('parentid', __('Parentid'));
		$grid->column('name', __('Name'));
		$grid->column('thumb', __('Thumb'));
		$grid->column('description', __('Description'));
		$grid->column('advimg', __('Advimg'));
		$grid->column('advurl', __('Advurl'));
		$grid->column('sort', __('Sort'));
		$grid->column('status', __('Status'));
		$grid->column('isdefault', __('Isdefault'));
		$grid->column('case', __('Case'));
		$grid->column('spider_type', __('Spider type'));
		$grid->column('ishome', __('Ishome'));
		$grid->column('isrecommand', __('Isrecommand'));
		$grid->column('created_at', __('Created at'));
		$grid->column('updated_at', __('Updated at'));
		$grid->column('deleted_at', __('Deleted at'));

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
		$show->field('user_id', __('User id'));
		$show->field('app_id', __('App id'));
		$show->field('parentid', __('Parentid'));
		$show->field('name', __('Name'));
		$show->field('thumb', __('Thumb'));
		$show->field('description', __('Description'));
		$show->field('advimg', __('Advimg'));
		$show->field('advurl', __('Advurl'));
		$show->field('sort', __('Sort'));
		$show->field('status', __('Status'));
		$show->field('isdefault', __('Isdefault'));
		$show->field('case', __('Case'));
		$show->field('spider_type', __('Spider type'));
		$show->field('ishome', __('Ishome'));
		$show->field('isrecommand', __('Isrecommand'));
		$show->field('created_at', __('Created at'));
		$show->field('updated_at', __('Updated at'));
		$show->field('deleted_at', __('Deleted at'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new Category);

		$form->number('user_id', __('User id'));
		$form->number('app_id', __('App id'));
		$form->number('parentid', __('Parentid'));
		$form->text('name', __('Name'));
		$form->text('thumb', __('Thumb'));
		$form->text('description', __('Description'));
		$form->text('advimg', __('Advimg'));
		$form->text('advurl', __('Advurl'));
		$form->number('sort', __('Sort'))->default(100);
		$form->switch('status', __('Status'))->default(1);
		$form->switch('isdefault', __('Isdefault'));
		$form->text('case', __('Case'));
		$form->switch('spider_type', __('Spider type'));
		$form->switch('ishome', __('Ishome'));
		$form->switch('isrecommand', __('Isrecommand'));

		return $form;
	}
}

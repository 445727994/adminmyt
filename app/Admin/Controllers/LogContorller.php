<?php

namespace App\Admin\Controllers;

use App\Models\Log;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LogContorller extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = 'App\models\Log';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new Log);

		$grid->column('id', __('Id'));
		$grid->column('app_id', __('App id'));
		$grid->column('level', __('Level'));
		$grid->column('name', __('Name'));
		$grid->column('logo', __('Logo'));
		$grid->column('group_rate1', __('Group rate1'));
		$grid->column('group_rate2', __('Group rate2'));
		$grid->column('group_rate3', __('Group rate3'));
		$grid->column('commission_rate1', __('Commission rate1'));
		$grid->column('commission_rate2', __('Commission rate2'));
		$grid->column('commission_rate3', __('Commission rate3'));
		$grid->column('credit', __('Credit'));
		$grid->column('price1', __('Price1'));
		$grid->column('price2', __('Price2'));
		$grid->column('price3', __('Price3'));
		$grid->column('price4', __('Price4'));
		$grid->column('is_commission', __('Is commission'));
		$grid->column('is_group', __('Is group'));
		$grid->column('is_pid', __('Is pid'));
		$grid->column('default', __('Default'));
		$grid->column('status', __('Status'));
		$grid->column('is_show', __('Is show'));
		$grid->column('is_commission_rate2', __('Is commission rate2'));
		$grid->column('is_group_rate2', __('Is group rate2'));
		$grid->column('created_at', __('Created at'));
		$grid->column('updated_at', __('Updated at'));
		$grid->column('deleted_at', __('Deleted at'));
		$grid->column('is_change_group', __('Is change group'));
		$grid->column('friend1', __('Friend1'));
		$grid->column('friend2', __('Friend2'));
		$grid->column('friend3', __('Friend3'));
		$grid->column('friend4', __('Friend4'));
		$grid->column('friend5', __('Friend5'));
		$grid->column('friend6', __('Friend6'));
		$grid->column('self_reward', __('Self reward'));
		$grid->column('content', __('Content'));
		$grid->column('introduce', __('Introduce'));
		$grid->column('friend_time1', __('Friend time1'));
		$grid->column('friend_time2', __('Friend time2'));
		$grid->column('friend_time3', __('Friend time3'));
		$grid->column('friend_time4', __('Friend time4'));
		$grid->column('friend_time5', __('Friend time5'));
		$grid->column('friend_commission5', __('Friend commission5'));
		$grid->column('is_buy', __('Is buy'));
		$grid->column('is_exchange', __('Is exchange'));
		$grid->column('is_task', __('Is task'));
		$grid->column('push_reward', __('Push reward'));
		$grid->column('direct_reward', __('Direct reward'));
		$grid->column('group_reward', __('Group reward'));
		$grid->column('return_percent', __('Return percent'));
		$grid->column('edu_rate1', __('Edu rate1'));
		$grid->column('edu_rate2', __('Edu rate2'));
		$grid->column('is_edu', __('Is edu'));

		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(Log::findOrFail($id));

		$show->field('id', __('Id'));
		$show->field('app_id', __('App id'));
		$show->field('level', __('Level'));
		$show->field('name', __('Name'));
		$show->field('logo', __('Logo'));
		$show->field('group_rate1', __('Group rate1'));
		$show->field('group_rate2', __('Group rate2'));
		$show->field('group_rate3', __('Group rate3'));
		$show->field('commission_rate1', __('Commission rate1'));
		$show->field('commission_rate2', __('Commission rate2'));
		$show->field('commission_rate3', __('Commission rate3'));
		$show->field('credit', __('Credit'));
		$show->field('price1', __('Price1'));
		$show->field('price2', __('Price2'));
		$show->field('price3', __('Price3'));
		$show->field('price4', __('Price4'));
		$show->field('is_commission', __('Is commission'));
		$show->field('is_group', __('Is group'));
		$show->field('is_pid', __('Is pid'));
		$show->field('default', __('Default'));
		$show->field('status', __('Status'));
		$show->field('is_show', __('Is show'));
		$show->field('is_commission_rate2', __('Is commission rate2'));
		$show->field('is_group_rate2', __('Is group rate2'));
		$show->field('created_at', __('Created at'));
		$show->field('updated_at', __('Updated at'));
		$show->field('deleted_at', __('Deleted at'));
		$show->field('is_change_group', __('Is change group'));
		$show->field('friend1', __('Friend1'));
		$show->field('friend2', __('Friend2'));
		$show->field('friend3', __('Friend3'));
		$show->field('friend4', __('Friend4'));
		$show->field('friend5', __('Friend5'));
		$show->field('friend6', __('Friend6'));
		$show->field('self_reward', __('Self reward'));
		$show->field('content', __('Content'));
		$show->field('introduce', __('Introduce'));
		$show->field('friend_time1', __('Friend time1'));
		$show->field('friend_time2', __('Friend time2'));
		$show->field('friend_time3', __('Friend time3'));
		$show->field('friend_time4', __('Friend time4'));
		$show->field('friend_time5', __('Friend time5'));
		$show->field('friend_commission5', __('Friend commission5'));
		$show->field('is_buy', __('Is buy'));
		$show->field('is_exchange', __('Is exchange'));
		$show->field('is_task', __('Is task'));
		$show->field('push_reward', __('Push reward'));
		$show->field('direct_reward', __('Direct reward'));
		$show->field('group_reward', __('Group reward'));
		$show->field('return_percent', __('Return percent'));
		$show->field('edu_rate1', __('Edu rate1'));
		$show->field('edu_rate2', __('Edu rate2'));
		$show->field('is_edu', __('Is edu'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new Log);

		$form->number('app_id', __('App id'));
		$form->number('level', __('Level'));
		$form->text('name', __('Name'));
		$form->text('logo', __('Logo'));
		$form->decimal('group_rate1', __('Group rate1'))->default(0.00);
		$form->decimal('group_rate2', __('Group rate2'))->default(0.00);
		$form->decimal('group_rate3', __('Group rate3'))->default(0.00);
		$form->decimal('commission_rate1', __('Commission rate1'))->default(0.00);
		$form->decimal('commission_rate2', __('Commission rate2'))->default(0.00);
		$form->decimal('commission_rate3', __('Commission rate3'))->default(0.00);
		$form->decimal('credit', __('Credit'));
		$form->decimal('price1', __('Price1'))->default(0.00);
		$form->decimal('price2', __('Price2'))->default(0.00);
		$form->decimal('price3', __('Price3'))->default(0.00);
		$form->decimal('price4', __('Price4'))->default(0.00);
		$form->switch('is_commission', __('Is commission'));
		$form->switch('is_group', __('Is group'));
		$form->switch('is_pid', __('Is pid'));
		$form->switch('default', __('Default'));
		$form->switch('status', __('Status'))->default(1);
		$form->text('is_show', __('Is show'))->default('1');
		$form->switch('is_commission_rate2', __('Is commission rate2'))->default(1);
		$form->switch('is_group_rate2', __('Is group rate2'))->default(1);
		$form->switch('is_change_group', __('Is change group'));
		$form->number('friend1', __('Friend1'));
		$form->number('friend2', __('Friend2'));
		$form->number('friend3', __('Friend3'));
		$form->number('friend4', __('Friend4'));
		$form->number('friend5', __('Friend5'));
		$form->number('friend6', __('Friend6'));
		$form->decimal('self_reward', __('Self reward'))->default(0.00);
		$form->textarea('content', __('Content'));
		$form->textarea('introduce', __('Introduce'));
		$form->number('friend_time1', __('Friend time1'));
		$form->number('friend_time2', __('Friend time2'));
		$form->number('friend_time3', __('Friend time3'));
		$form->number('friend_time4', __('Friend time4'));
		$form->number('friend_time5', __('Friend time5'));
		$form->decimal('friend_commission5', __('Friend commission5'));
		$form->switch('is_buy', __('Is buy'));
		$form->switch('is_exchange', __('Is exchange'));
		$form->switch('is_task', __('Is task'));
		$form->decimal('push_reward', __('Push reward'))->default(0.00);
		$form->decimal('direct_reward', __('Direct reward'))->default(0.00);
		$form->decimal('group_reward', __('Group reward'))->default(0.00);
		$form->text('return_percent', __('Return percent'));
		$form->decimal('edu_rate1', __('Edu rate1'))->default(0.00);
		$form->decimal('edu_rate2', __('Edu rate2'))->default(0.00);
		$form->switch('is_edu', __('Is edu'));

		return $form;
	}
}

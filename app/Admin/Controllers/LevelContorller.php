<?php

namespace App\Admin\Controllers;

use App\models\Level;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class LevelContorller extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = '用户等级';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new Level);
		$grid->column('id', __('Id'));
		$grid->column('level', __('权重'));
		$grid->column('name', __('等级名'));
		$grid->column('logo', __('图标'))->image('', 100, 100);
		$grid->column('friend1', __('直推'));
		$grid->column('friend2', __('间推'));
		$grid->column('commission_rate1', __('自返'));
		$grid->column('commission_rate2', __('直推'));
		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(Level::findOrFail($id));
		$show->field('id', __('Id'));
		$show->field('level', __('权重'));
		$show->field('name', __('名称'));
		$show->field('logo', __('图标'));
		$show->field('group_rate1', __('团队奖1'));
		$show->field('group_rate2', __('团队奖2'));
		$show->field('group_rate3', __('团队奖3'));
		$show->field('commission_rate1', __('自返'));
		$show->field('commission_rate2', __('直推'));
		$show->field('commission_rate3', __('间推'));
		// $show->field('is_edu', __('Is edu'));
		$show->field('edu_rate1', __('教育奖1'));
		$show->field('edu_rate2', __('教育奖2'));
		$show->field('friend1', __('升级直推VIP人数'));
		$show->field('friend2', __('升级间推VIP人数'));
		$show->field('friend3', __('Friend3'));
		$show->field('friend4', __('Friend4'));
		$show->field('friend5', __('升级直推超伙人数'));
		$show->field('friend6', __('升级总计超火人数'));
		$show->field('self_reward', __('升级达标佣金'));
		$show->field('friend_commission5', __('超火达标佣金'));
		$show->field('content', __('等级介绍'));
		// $show->field('credit', __('Credit'));
		// $show->field('price1', __('Price1'));
		// $show->field('price2', __('Price2'));
		// $show->field('price3', __('Price3'));
		// $show->field('price4', __('Price4'));
		// $show->field('is_commission', __('Is commission'));
		// $show->field('is_group', __('Is group'));
		// $show->field('is_pid', __('Is pid'));
		// $show->field('default', __('Default'));
		// $show->field('status', __('Status'));
		$show->field('is_show', __('显示'));
		// $show->field('is_commission_rate2', __('Is commission rate2'));
		// $show->field('is_group_rate2', __('Is group rate2'));
		$show->field('created_at', __('Created at'));
		$show->field('updated_at', __('Updated at'));
		$show->field('deleted_at', __('Deleted at'));
		// $show->field('is_change_group', __('Is change group'));

		// $show->field('introduce', __('Introduce'));
		// $show->field('friend_time1', __('Friend time1'));
		// $show->field('friend_time2', __('Friend time2'));
		// $show->field('friend_time3', __('Friend time3'));
		// $show->field('friend_time4', __('Friend time4'));
		// $show->field('friend_time5', __('Friend time5'));

		// $show->field('is_buy', __('Is buy'));
		// $show->field('is_exchange', __('Is exchange'));
		// $show->field('is_task', __('Is task'));
		// $show->field('push_reward', __('Push reward'));
		// $show->field('direct_reward', __('Direct reward'));
		// $show->field('group_reward', __('Group reward'));
		// $show->field('return_percent', __('Return percent'));
		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new Level);
		$form->number('level', __('权重'));
		$form->text('name', __('名称'));
		$form->image('logo', __('图标'));
		$form->decimal('group_rate1', __('团队奖1'))->default(0.00);
		$form->decimal('group_rate2', __('团队奖2'))->default(0.00);
		$form->decimal('group_rate3', __('团队奖3'))->default(0.00);
		$form->decimal('commission_rate1', __('自返'))->default(0.00);
		$form->decimal('commission_rate2', __('直推'))->default(0.00);
		$form->decimal('commission_rate3', __('间推'))->default(0.00);
		$form->decimal('edu_rate1', __('教育奖1'))->default(0.00);
		$form->decimal('edu_rate2', __('教育奖2'))->default(0.00);
		// $form->decimal('credit', __('Credit'));
		// $form->decimal('price1', __('Price1'))->default(0.00);
		// $form->decimal('price2', __('Price2'))->default(0.00);
		// $form->decimal('price3', __('Price3'))->default(0.00);
		// $form->decimal('price4', __('Price4'))->default(0.00);
		// $form->switch('is_commission', __('Is commission'));
		// $form->switch('is_group', __('Is group'));
		// $form->switch('is_pid', __('Is pid'));
		// $form->switch('default', __('Default'));
		// $form->switch('status', __('Status'))->default(1);
		$form->switch('is_show', __('显示'))->default('1');
		// $form->switch('is_commission_rate2', __('Is commission rate2'))->default(1);
		// $form->switch('is_group_rate2', __('Is group rate2'))->default(1);
		// $form->switch('is_change_group', __('Is change group'));
		$form->number('friend1', __('升级直推VIP人数'));
		$form->number('friend2', __('升级间推VIP人数'));
		// $form->number('friend3', __('Friend3'));
		// $form->number('friend4', __('Friend4'));
		$form->number('friend5', __('升级直推超伙人数'));
		$form->number('friend6', __('升级总计超火人数'));
		$form->decimal('self_reward', __('升级达标佣金'))->default(0.00);
		$form->decimal('friend_commission5', __('超火达标佣金'));
		$form->kindeditor('content', __('等级介绍'));
		// $form->textarea('introduce', __('Introduce'));
		// $form->number('friend_time1', __('Friend time1'));
		// $form->number('friend_time2', __('Friend time2'));
		// $form->number('friend_time3', __('Friend time3'));
		// $form->number('friend_time4', __('Friend time4'));
		// $form->number('friend_time5', __('Friend time5'));

		// $form->switch('is_buy', __('Is buy'));
		// $form->switch('is_exchange', __('Is exchange'));
		// $form->switch('is_task', __('Is task'));
		// $form->decimal('push_reward', __('Push reward'))->default(0.00);
		// $form->decimal('direct_reward', __('Direct reward'))->default(0.00);
		// $form->decimal('group_reward', __('Group reward'))->default(0.00);
		// $form->text('return_percent', __('Return percent'));

		// $form->switch('is_edu', __('Is edu'));

		return $form;
	}
}

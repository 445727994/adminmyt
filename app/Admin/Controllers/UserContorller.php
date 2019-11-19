<?php

namespace App\Admin\Controllers;

use App\models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class UserContorller extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = 'App\models\User';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		//use Illuminate\Support\Facades\Schema;
		// $columns = Schema::getColumnListing('users');
		// dd($columns);

		$grid = new Grid(new User);

		$grid->column('id', __('Id'));
		$grid->column('inviter.nickname', __('邀请人'));
		$grid->column('group.nickname', __('上级合伙人'));
		$grid->column('edu.nickname', __('联创'));
		// $grid->column('oldgroup_id', __('Oldgroup id'));
		// $grid->column('wx_unionid', __('Wx unionid'));
		// $grid->column('wx_openid1', __('Wx openid1'));
		// $grid->column('wx_openid2', __('Wx openid2'));
		// $grid->column('ali_unionid', __('Ali unionid'));
		// $grid->column('ali_openid1', __('Ali openid1'));
		// $grid->column('ali_openid2', __('Ali openid2'));
		$grid->column('nickname', __('昵称'));
		$grid->column('phone', __('手机'));
		// $grid->column('password', __('Password'));
		$grid->column('headimgurl', __('头像'))->image('', 50, 50);
		// $grid->column('is_default', __('Is default'));
		$grid->column('credit1', __('佣金'));
		// $grid->column('credit2', __('Credit2'));
		// $grid->column('credit3', __('Credit3'));
		// $grid->column('credit4', __('Credit4'));
		$grid->column('level.name', __('等级'));
		$grid->column('realname', __('真实姓名'));

		$grid->column('invite_code', __('自定义邀请码'));
		// $grid->column('remember_token', __('Remember token'));
		// $grid->column('expired_time', __('Expired time'));
		// $grid->column('signin_time', __('Signin time'));
		// $grid->column('max_signin', __('Max signin'));
		// $grid->column('created_at', __('Created at'));
		// $grid->column('updated_at', __('Updated at'));
		// $grid->column('deleted_at', __('Deleted at'));
		// $grid->column('credit5', __('Credit5'));
		// $grid->column('sign_max', __('Sign max'));
		// $grid->column('sign_continuous', __('Sign continuous'));
		// $grid->column('sign_sum', __('Sign sum'));
		// $grid->column('hmtk_sid', __('Hmtk sid'));
		// $grid->column('jiesuan', __('Jiesuan'));
		// $grid->column('group_count', __('Group count'));
		// $grid->column('order_total', __('Order total'));
		// $grid->column('fans', __('Fans'));
		// ;
		// $grid->column('device_id', __('Device id'));

		$grid->column('credit6', __('积分'));
		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(User::findOrFail($id));

		$show->field('id', __('Id'));

		$show->field('inviter_id', __('邀请人'));
		$show->field('group_id', __('上级合伙人'));

		$show->field('nickname', __('昵称'));
		$show->field('phone', __('手机'));
		$show->field('password', __('Password'));
		$show->field('headimgurl', __('头像'));
		$show->field('is_default', __('Is default'));
		$show->field('credit1', __('佣金'));

		$show->field('level_id', __('等级'));
		$show->field('realname', __('真实姓名'));

		$show->field('invite_code', __('自定义邀请码'));

		$show->field('edu_id', __('联创'));

		$show->field('credit6', __('积分'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new User);

		$form->number('app_id', __('App id'));
		$form->number('inviter_id', __('邀请人'));
		$form->number('group_id', __('上级合伙人'));
		$form->number('edu_id', __('联创'));
		$form->text('nickname', __('昵称'));
		$form->mobile('phone', __('手机'));

		$form->text('headimgurl', __('头像'));

		$form->decimal('credit1', __('佣金'))->default(0.00);

		$form->decimal('credit6', __('积分'))->default(0.00);

		$form->number('level_id', __('等级'));
		$form->text('realname', __('真实姓名'));

		// $form->switch('status', __('Status'))->default(1);
		$form->text('invite_code', __('自定义邀请码'));

		return $form;
	}
}

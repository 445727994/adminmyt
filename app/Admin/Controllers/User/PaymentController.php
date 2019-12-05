<?php

namespace App\Admin\Controllers\User;

use App\Models\User\Payment;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PaymentController extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = '支付记录';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new Payment);
		$grid->disableCreateButton();
		$grid->column('id', __('Id'));
		$grid->column('user_id', __('用户'));
		// $grid->column('app_id', __('App id'));
		$grid->column('price', __('金额'));
		$grid->column('transaction_id', __('三方订单号'));
		$grid->column('out_trade_no', __('平台订单号'));
		$grid->column('type', __('订单类型'))->using(['20' => '商城订单']);
		$grid->column('status', __('状态'))->using(['0' => '未支付', '1' => '已支付', '2' => '未支付']);
		// $grid->column('other', __('Other'));
		$grid->column('payment_at', __('支付时间'));
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
		$show = new Show(Payment::findOrFail($id));

		$show->field('id', __('Id'));
		$show->field('user.nickname', __('用户'));
		$show->field('app_id', __('App id'));
		$show->field('price', __('金额'));
		$show->field('transaction_id', __('三方订单号'));
		$show->field('out_trade_no', __('平台订单号'));
		$show->field('type', __('订单类型'));
		$show->field('status', __('状态'));
		$show->field('other', __('Other'));
		$show->field('payment_at', __('支付时间'));
		$show->field('created_at', __('创建时间'));
		$show->field('updated_at', __('更新时间'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new Payment);

		$form->text('user.nickname', __('用户'))->disable();
		// $form->number('app_id', __('App id'));
		$form->decimal('price', __('金额'));
		$form->text('transaction_id', __('三方订单号'));
		$form->text('out_trade_no', __('平台订单号'))->disable();
		$form->radio('type', __('订单类型'))->options(['20' => '商城订单']);
		$form->radio('status', __('状态'))->options(['0' => '未支付', '1' => '已支付'])->default('0');
		// $form->text('other', __('Other'));
		$form->datetime('payment_at', __('支付时间'))->default(date('Y-m-d H:i:s'));
		return $form;
	}
}

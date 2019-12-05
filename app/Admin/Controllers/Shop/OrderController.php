<?php

namespace App\Admin\Controllers\Shop;

use App\Models\Shop\Order;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class OrderController extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = '商品订单';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new Order);
		$grid->disableCreateButton();
		$grid->column('id', __('Id'));
		$grid->column('user.nickname', __('用户'));
		// $grid->column('merch_id', __('机器号'));
		// $grid->column('app_id', __('appId号'));
		$grid->column('orderno', __('订单号'));
		$grid->column('total_price', __('总金额'));
		// $grid->column('discount_price', __('Discount price'));
		// $grid->column('dispatch_price', __('Dispatch price'));
		// $grid->column('deduct_credit1', __('Deduct credit1'));
		// $grid->column('deduct_credit2', __('Deduct credit2'));
		// $grid->column('deduct_enough', __('Deduct enough'));
		// $grid->column('change_price', __('Change price'));
		// $grid->column('change_dispatch_price', __('Change dispatch price'));
		// $grid->column('old_price', __('Old price'));
		// $grid->column('old_dispatch_price', __('Old dispatch price'));
		// $grid->column('coupon_id', __('Coupon id'));
		// $grid->column('coupon_price', __('Coupon price'));
		// $grid->column('address_id', __('地址ID'));
		$grid->column('address', __('地址'));
		$grid->column('paytype', __('支付方式'));
		// $grid->column('type', __('Type'));
		$grid->column('status', __('状态'))->using(['0' => '未支付', '1' => '已支付', '3' => '已发货', '4' => '已确认']);
		$grid->column('remark', __('备注'));
		// $grid->column('close_reason', __('Close reason'));
		$grid->column('pay_time', __('支付时间'));
		// $grid->column('cancel_time', __('Cancel time'));
		$grid->column('created_at', __('创建时间'));
		$grid->column('updated_at', __('更新时间'));
		// $grid->column('deleted_at', __('删除时间'));
		// $grid->column('is_calculate', __('Is calculate'));

		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(Order::findOrFail($id));

		$show->field('id', __('Id'));
		$show->field('user_id', __('用户'));
		// $show->field('merch_id', __('机器号'));
		// $show->field('app_id', __('appId号'));
		$show->field('orderno', __('订单号'));
		$show->field('total_price', __('总金额'));
		// $show->field('discount_price', __('Discount price'));
		// $show->field('dispatch_price', __('Dispatch price'));
		// $show->field('deduct_credit1', __('Deduct credit1'));
		// $show->field('deduct_credit2', __('Deduct credit2'));
		// $show->field('deduct_enough', __('Deduct enough'));
		// $show->field('change_price', __('Change price'));
		// $show->field('change_dispatch_price', __('Change dispatch price'));
		// $show->field('old_price', __('Old price'));
		// $show->field('old_dispatch_price', __('Old dispatch price'));
		// $show->field('coupon_id', __('Coupon id'));
		// $show->field('coupon_price', __('Coupon price'));
		// $show->field('address_id', __('地址ID'));
		$show->field('address', __('地址'));
		$show->field('paytype', __('支付方式'));
		// $show->field('type', __('Type'));
		$show->field('status', __('状态'));
		$show->field('remark', __('备注'));
		// $show->field('close_reason', __('Close reason'));
		$show->field('pay_time', __('支付时间'));
		// $show->field('cancel_time', __('Cancel time'));
		$show->field('created_at', __('创建时间'));
		$show->field('updated_at', __('更新时间'));
		$show->field('deleted_at', __('删除时间'));
		// $show->field('is_calculate', __('Is calculate'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new Order);

		$form->number('user_id', __('用户'));
		// $form->number('merch_id', __('机器号'));
		// $form->number('app_id', __('appId号'));
		$form->text('orderno', __('订单号'));
		$form->decimal('total_price', __('总金额'));
		// $form->decimal('discount_price', __('Discount price'))->default(0.00);
		// $form->decimal('dispatch_price', __('Dispatch price'))->default(0.00);
		// $form->decimal('deduct_credit1', __('Deduct credit1'))->default(0.00);
		// $form->number('deduct_credit2', __('Deduct credit2'));
		// $form->decimal('deduct_enough', __('Deduct enough'))->default(0.00);
		// $form->decimal('change_price', __('Change price'))->default(0.00);
		// $form->decimal('change_dispatch_price', __('Change dispatch price'))->default(0.00);
		// $form->decimal('old_price', __('Old price'))->default(0.00);
		// $form->decimal('old_dispatch_price', __('Old dispatch price'));
		// $form->number('coupon_id', __('Coupon id'));
		// $form->decimal('coupon_price', __('Coupon price'))->default(0.00);
		// $form->number('address_id', __('地址ID'));
		$form->textarea('address', __('地址'));
		// $form->switch('paytype', __('支付方式'));
		// $form->switch('type', __('Type'));
		$form->radio('status', __('状态'))->options(['0' => '未支付', '1' => '已支付', '3' => '已发货', '4' => '已确认']);
		$form->textarea('remark', __('备注'));
		// $form->text('close_reason', __('Close reason'));
		$form->datetime('pay_time', __('支付时间'))->default(date('Y-m-d H:i:s'));
		// $form->datetime('cancel_time', __('Cancel time'))->default(date('Y-m-d H:i:s'));
		// $form->number('is_calculate', __('Is calculate'));

		return $form;
	}
}

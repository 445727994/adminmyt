<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Free\Replicate as FreeRep;
use App\Models\Coupon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CouponController extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = '商品列表';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new Coupon);
		$grid->quickSearch(['title', 'short_title', 'item_id']);
		$grid->filter(function ($filter) {
			// 去掉默认的id过滤器
			$filter->disableIdFilter();
			// 在这里添加字段过滤器
			$filter->like('title', '标题');
			$filter->like('item_id', '淘宝商品ID');
		});
		$grid->column('id', __('Id'));
		$grid->column('title', __('标题'))->width(100);
		$grid->column('short_title', __('短标题'))->width(100);
		$grid->column('cate.name', __('分类'));
		// $grid->column('shop_type', __('商店类型'));

		$grid->column('pic_url', __('商品图'))->image('', 100, 100);
		$grid->column('item_id', __('商品ID'));

		$grid->column('volume', __('月销'))->sortable();
		// $grid->column('volume1', __('2小时销量'));
		// $grid->column('volume2', __('当天销量'));
		$grid->column('price', __('价格'))->sortable();
		$grid->column('final_price', __('最终价格'))->sortable();
		$grid->column('coupon_price', __('优惠券价格'))->sortable();
		//$grid->column('coupon_link', __('优惠券url'));
		// $grid->column('seller_id', __('店铺ID'));
		//$grid->column('hot', __('Hot'));
		//$grid->column('tag', __('Tag'));
		$grid->column('shop_name', __('商店名称'));
		$grid->column('nick', __('商店昵称'));
		//$grid->column('activity_id', __('Activity id'));
		$grid->column('commission_rate', __('佣金比率%'))->sortable();
		// $grid->column('introduce', __('Introduce'));
		// $grid->column('total_num', __('总量'));
		// $grid->column('receive_num', __('已领数量'));
		// $grid->column('videoid', __('Videoid'));
		// $grid->column('is_recommend', __('Is recommend'));
		// $grid->column('sort', __('Sort'));
		// $grid->column('activity_type', __('Activity type'));
		// $grid->column('threshold_coupon', __('Threshold coupon'));
		// $grid->column('type', __('Type'));
		// $grid->column('status', __('Status'));
		// $grid->column('spider', __('Spider'));
		$grid->column('start_time', __('开始时间'));
		$grid->column('end_time', __('结束时间'));
		// $grid->column('created_at', __('创建时间'));
		$grid->column('updated_at', __('更新时间'));
		$grid->actions(function ($actions) {

			// 去掉删除
			$actions->disableDelete();
			$actions->add(new FreeRep);
		});
		return $grid;
	}
	public function dialog() {
		$this->confirm('确定复制？');
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(Coupon::findOrFail($id));

		$show->field('id', __('Id'));
		$show->field('title', __('标题'));
		$show->field('short_title', __('短标题'));
		$show->field('name', __('分类'));
		$show->field('shop_type', __('商店类型'));
		$show->field('pic_url', __('商品图'));

		$show->field('item_id', __('商品ID'));
		$show->field('item_url', __('Item url'));
		$show->field('volume', __('月销'));
		$show->field('volume1', __('2小时销量'));
		$show->field('volume2', __('当天销量'));
		$show->field('price', __('价格'));
		$show->field('final_price', __('最终价格'));
		$show->field('coupon_price', __('优惠券价格'));
		$show->field('coupon_link', __('优惠券url'));
		$show->field('seller_id', __('店铺ID'));
		// $show->field('hot', __('Hot'));
		// $show->field('tag', __('Tag'));
		$show->field('shop_name', __('商店名称'));
		$show->field('nick', __('商店昵称'));
		$show->field('activity_id', __('Activity id'));
		$show->field('commission_rate', __('佣金比率%'));
		// $show->field('introduce', __('Introduce'));
		$show->field('total_num', __('总量'));
		$show->field('receive_num', __('已领数量'));
		// $show->field('videoid', __('Videoid'));
		// $show->field('is_recommend', __('Is recommend'));
		// $show->field('sort', __('Sort'));
		// $show->field('activity_type', __('Activity type'));
		// $show->field('threshold_coupon', __('Threshold coupon'));
		// $show->field('type', __('Type'));
		// $show->field('status', __('Status'));
		// $show->field('spider', __('Spider'));
		$show->field('start_time', __('开始时间'));
		$show->field('end_time', __('结束时间'));
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
		$form = new Form(new Coupon);

		$form->text('title', __('标题'));
		$form->text('short_title', __('短标题'));
		$form->text('cate.name', __('分类'))->disable();
		$form->switch('shop_type', __('商店类型'));
		$form->image('pic_url', __('商品图'))->disable();
		$form->text('item_id', __('商品ID'));
		$form->text('item_url', __('Item url'));
		$form->number('volume', __('月销'));
		$form->number('volume1', __('2小时销量'));
		$form->number('volume2', __('当天销量'));
		$form->decimal('price', __('价格'));
		$form->decimal('final_price', __('最终价格'));
		$form->decimal('coupon_price', __('优惠券价格'));
		$form->text('coupon_link', __('优惠券url'));
		$form->text('seller_id', __('店铺ID'));
		// $form->text('hot', __('Hot'))->default('4.6');
		// $form->text('tag', __('Tag'))->default('4.6');
		$form->text('shop_name', __('商店名称'));
		$form->text('nick', __('商店昵称'));
		// $form->text('activity_id', __('Activity id'));
		$form->decimal('commission_rate', __('佣金比率%'));
		// $form->text('introduce', __('Introduce'));
		$form->number('total_num', __('总量'));
		$form->number('receive_num', __('已领数量'));
		// $form->text('videoid', __('Videoid'));
		// $form->switch('is_recommend', __('Is recommend'));
		// $form->number('sort', __('Sort'));
		// $form->switch('activity_type', __('Activity type'));
		// $form->textarea('threshold_coupon', __('Threshold coupon'));
		// $form->switch('type', __('Type'));
		// $form->switch('status', __('Status'));
		// $form->text('spider', __('Spider'));
		$form->datetime('start_time', __('开始时间'))->default(date('Y-m-d H:i:s'));
		$form->datetime('end_time', __('结束时间'))->default(date('Y-m-d H:i:s'));

		return $form;
	}
}

<?php

namespace App\Admin\Controllers;

use App\Models\Shop\Category;
use App\Models\Shop\Goods;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ShopGoodsController extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = '商品';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new Goods);

		$grid->column('id', __('Id'));
		// $grid->column('user_id', __('User id'));
		// $grid->column('merch_id', __('Merch id'));
		$grid->column('title', __('标题'));
		$grid->column('keywords', __('关键字'));
		$grid->column('cate.name', __('分类'));
		$grid->column('short_title', __('短标题'));
		$grid->column('thumb', __('缩略图'))->image('', 50, 50);
		//$grid->column('description', __('简单描述'));
		//$grid->column('content', __('内容'));
		$grid->column('goodssn', __('货号'));
		//$grid->column('productsn', __('Productsn'));
		$grid->column('price', __('价格'));
		$grid->column('old_price', __('市场价'));
		// $grid->column('cost_price', __('Cost price'));
		// $grid->column('min_price', __('最低价'));
		// $grid->column('max_price', __('最高价'));
		$grid->column('total', __('总库存'));
		//$grid->column('totalcnf', __('总库存cnf'));
		$grid->column('sales', __('销量'));
		//$grid->column('real_sales', __('真实销量'));
		//$grid->column('show_sales', __('展示销量'));
		//$grid->column('show_spec', __('Show spec'));
		$grid->column('weight', __('重量'));
		// $grid->column('credit', __('Credit'));
		// $grid->column('minbuy', __('Minbuy'));
		// $grid->column('maxbuy', __('Maxbuy'));
		// $grid->column('total_maxbuy', __('总库存 maxbuy'));
		// $grid->column('hasoption', __('Hasoption'));
		$grid->column('isnew', __('是否新品'));
		$grid->column('ishot', __('是否热门'));
		// $grid->column('isrecommend', __('Isrecommend'));
		// $grid->column('isdiscount', __('Isdiscount'));
		// $grid->column('discount_title', __('Discount title'));
		// $grid->column('discount_end', __('Discount end'));
		// $grid->column('discount_price', __('Discount price'));
		// $grid->column('issendfree', __('Issendfree'));
		// $grid->column('iscomment', __('Iscomment'));
		// $grid->column('views', __('Views'));
		// $grid->column('hascommission', __('Hascommission'));
		// $grid->column('commission0_rate', __('Commission0 rate'));
		// $grid->column('commission0_pay', __('Commission0 pay'));
		// $grid->column('commission1_rate', __('Commission1 rate'));
		// $grid->column('commission1_pay', __('Commission1 pay'));
		// $grid->column('commission2_rate', __('Commission2 rate'));
		// $grid->column('commission2_pay', __('Commission2 pay'));
		// $grid->column('commission3_rate', __('Commission3 rate'));
		// $grid->column('commission3_pay', __('Commission3 pay'));
		// $grid->column('is_not_discount', __('Is not discount'));
		// $grid->column('deduct_credit1', __('Deduct credit1'));
		// $grid->column('deduct_credit2', __('Deduct credit2'));
		// $grid->column('dispatch_type', __('Dispatch type'));
		// $grid->column('dispatch_id', __('Dispatch id'));
		// $grid->column('dispatch_price', __('Dispatch price'));
		// $grid->column('province', __('Province'));
		// $grid->column('city', __('City'));
		// $grid->column('tags', __('Tags'));
		// $grid->column('show_total', __('Show total'));
		// $grid->column('auto_receive', __('Auto receive'));
		// $grid->column('can_not_refund', __('Can not refund'));
		//$grid->column('type', __('Type'));
		$grid->column('status', __('状态'));
		$grid->column('sort', __('排序'));
		//$grid->column('app_id', __('App id'));
		$grid->column('created_at', __('创建时间'));
		$grid->column('updated_at', __('更新时间'));
		$grid->column('deleted_at', __('删除时间'));

		return $grid;
	}

	/**
	 * Make a show builder.
	 *
	 * @param mixed $id
	 * @return Show
	 */
	protected function detail($id) {
		$show = new Show(Goods::findOrFail($id));
		$show->field('id', __('Id'));
		// $show->field('user_id', __('User id'));
		// $show->field('merch_id', __('Merch id'));
		$show->field('title', __('标题'));
		$show->field('keywords', __('关键字'));
		$show->field('short_title', __('短标题'));
		$show->field('cate.name', __('分类'));
		$show->field('thumb', __('缩略图'));
		$show->field('description', __('简单描述'));
		$show->kindeditor('content', __('内容'));
		$show->field('goodssn', __('货号'));
		//$show->field('productsn', __('Productsn'));
		$show->field('price', __('价格'));
		$show->field('old_price', __('市场价'));
		// $show->field('cost_price', __('Cost price'));
		// $show->field('min_price', __('最低价'));
		// $show->field('max_price', __('最高价'));
		$show->field('total', __('总库存'));
		$show->field('totalcnf', __('总库存cnf'));
		$show->field('sales', __('销量'));
		$show->field('real_sales', __('真实销量'));
		$show->field('show_sales', __('展示销量'));
		//$show->field('show_spec', __('Show spec'));
		$show->field('weight', __('重量'));
		// $show->field('credit', __('Credit'));
		// $show->field('minbuy', __('Minbuy'));
		// $show->field('maxbuy', __('Maxbuy'));
		// $show->field('total_maxbuy', __('总库存 maxbuy'));
		// $show->field('hasoption', __('Hasoption'));
		$show->field('isnew', __('是否新品'));
		$show->field('ishot', __('是否热门'));
		// $show->field('isrecommend', __('Isrecommend'));
		// $show->field('isdiscount', __('Isdiscount'));
		// $show->field('discount_title', __('Discount title'));
		// $show->field('discount_end', __('Discount end'));
		// $show->field('discount_price', __('Discount price'));
		// $show->field('issendfree', __('Issendfree'));
		// $show->field('iscomment', __('Iscomment'));
		// $show->field('views', __('Views'));
		// $show->field('hascommission', __('Hascommission'));
		// $show->field('commission0_rate', __('Commission0 rate'));
		// $show->field('commission0_pay', __('Commission0 pay'));
		// $show->field('commission1_rate', __('Commission1 rate'));
		// $show->field('commission1_pay', __('Commission1 pay'));
		// $show->field('commission2_rate', __('Commission2 rate'));
		// $show->field('commission2_pay', __('Commission2 pay'));
		// $show->field('commission3_rate', __('Commission3 rate'));
		// $show->field('commission3_pay', __('Commission3 pay'));
		// $show->field('is_not_discount', __('Is not discount'));
		// $show->field('deduct_credit1', __('Deduct credit1'));
		// $show->field('deduct_credit2', __('Deduct credit2'));
		// $show->field('dispatch_type', __('Dispatch type'));
		// $show->field('dispatch_id', __('Dispatch id'));
		// $show->field('dispatch_price', __('Dispatch price'));
		// $show->field('province', __('Province'));
		// $show->field('city', __('City'));
		// $show->field('tags', __('Tags'));
		// $show->field('show_total', __('Show total'));
		// $show->field('auto_receive', __('Auto receive'));
		// $show->field('can_not_refund', __('Can not refund'));
		// $show->field('type', __('Type'));
		$show->field('status', __('状态'));
		$show->field('sort', __('排序'));
		$show->field('app_id', __('App id'));
		$show->field('created_at', __('创建时间'));
		$show->field('updated_at', __('更新时间'));
		$show->field('deleted_at', __('删除时间'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new Goods);

		// $form->number('user_id', __('User id'));
		// $form->number('merch_id', __('Merch id'));
		$form->text('title', __('标题'));
		$form->text('keywords', __('关键字'));
		$form->text('short_title', __('短标题'));
		$form->select('category_id', __('分类'))->options(Category::selectOption())->help('选择商品分类')->rules('required', ['required' => '请选择分类']);
		//$form->image('thumb', __('缩略图'));
		$form->multipleImage('thumb', __('营销图'))->uniqueName()->sortable()->removable();
		$form->text('description', __('简单描述'));
		$form->textarea('content', __('内容'));
		$form->text('goodssn', __('货号'));
		//$form->text('productsn', __('Productsn'));
		$form->decimal('price', __('价格'));
		$form->decimal('old_price', __('市场价'));
		// $form->decimal('cost_price', __('Cost price'));
		// $form->decimal('min_price', __('最低价'));
		// $form->decimal('max_price', __('最高价'));
		$form->number('total', __('总库存'));
		// $form->switch('totalcnf', __('总库存cnf'));
		$form->number('sales', __('销量'));
		$form->number('real_sales', __('真实销量'));
		$form->switch('show_sales', __('展示销量'))->default(1);
		//$form->switch('show_spec', __('Show spec'));
		$form->decimal('weight', __('重量'));
		// $form->decimal('credit', __('Credit'));
		// $form->number('minbuy', __('Minbuy'));
		// $form->number('maxbuy', __('Maxbuy'));
		// $form->number('total_maxbuy', __('总库存 maxbuy'));
		// $form->switch('hasoption', __('Hasoption'));
		// $form->switch('isnew', __('是否新品'));
		// $form->switch('ishot', __('是否热门'));
		// $form->switch('isrecommend', __('Isrecommend'));
		// $form->switch('isdiscount', __('Isdiscount'));
		// $form->text('discount_title', __('Discount title'));
		// $form->datetime('discount_end', __('Discount end'))->default(date('Y-m-d H:i:s'));
		// $form->decimal('discount_price', __('Discount price'));
		// $form->switch('issendfree', __('Issendfree'));
		// $form->switch('iscomment', __('Iscomment'));
		// $form->number('views', __('Views'));
		// $form->switch('hascommission', __('Hascommission'));
		// $form->decimal('commission0_rate', __('Commission0 rate'))->default(0.00);
		// $form->decimal('commission0_pay', __('Commission0 pay'))->default(0.00);
		// $form->decimal('commission1_rate', __('Commission1 rate'))->default(0.00);
		// $form->decimal('commission1_pay', __('Commission1 pay'))->default(0.00);
		// $form->decimal('commission2_rate', __('Commission2 rate'))->default(0.00);
		// $form->decimal('commission2_pay', __('Commission2 pay'))->default(0.00);
		// $form->decimal('commission3_rate', __('Commission3 rate'))->default(0.00);
		// $form->decimal('commission3_pay', __('Commission3 pay'))->default(0.00);
		// $form->switch('is_not_discount', __('Is not discount'));
		// $form->switch('deduct_credit1', __('Deduct credit1'));
		// $form->switch('deduct_credit2', __('Deduct credit2'));
		// $form->switch('dispatch_type', __('Dispatch type'));
		// $form->number('dispatch_id', __('Dispatch id'));
		// $form->decimal('dispatch_price', __('Dispatch price'));
		// $form->text('province', __('Province'));
		// $form->text('city', __('City'));
		// $form->text('tags', __('Tags'));
		// $form->switch('show_total', __('Show total'));
		// $form->switch('auto_receive', __('Auto receive'));
		// $form->switch('can_not_refund', __('Can not refund'));
		// $form->switch('type', __('Type'));
		$form->switch('status', __('显示？'));
		$form->number('sort', __('排序'));
		//$form->number('app_id', __('App id'));
		$form->saved(function (Form $form) {
			//	$form->category;

		});
		return $form;
	}
}

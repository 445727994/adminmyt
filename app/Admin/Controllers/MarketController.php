<?php

namespace App\Admin\Controllers;

use App\Models\Market;
use App\Models\MarketCate;
use App\Models\MarketUser;
use App\Tools\Taoke\Taobao;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\MessageBag;

class MarketController extends AdminController {
	/**
	 * Title for current resource.
	 *
	 * @var string
	 */
	protected $title = '发圈内容';

	/**
	 * Make a grid builder.
	 *
	 * @return Grid
	 */
	protected function grid() {
		$grid = new Grid(new Market);

		$grid->column('id', __('Id'));
		$grid->column('content', __('标题'));
		$grid->column('images', __('图片'))->image('', 100, 100);
		$grid->column('shares', __('分享次数'));
		//$grid->column('type', __('Type'));
		$grid->column('cate.name', __('分类')); //
		$grid->column('item_id', __('淘宝商品ID'));
		//$grid->column('item_pic', __('Item pic'));
		$grid->column('item_title', __('淘宝商品标题'));
		$grid->column('publish.name', __('发布人'));
		//$grid->column('is_jx', __('Is jx'));
		$grid->column('copy_text', __('复制文案'));
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
		$show = new Show(Market::findOrFail($id));

		$show->field('id', __('Id'));
		$show->field('content', __('标题'));
		$show->field('images', __('图片'));
		$show->field('shares', __('分享次数'));
		$show->field('created_at', __('创建时间'));
		$show->field('updated_at', __('更新时间'));
		$show->field('type', __('Type'));
		$show->field('item_id', __('淘宝商品ID'));
		$show->field('item_pic', __('Item pic'));
		$show->field('item_title', __('淘宝商品标题'));
		$show->field('cate_id', __('Cate id'));
		$show->field('publish_id', __('发布人'));
		$show->field('is_jx', __('Is jx'));
		$show->field('copy_text', __('复制文案'));

		return $show;
	}

	/**
	 * Make a form builder.
	 *
	 * @return Form
	 */
	protected function form() {
		$form = new Form(new Market);

		$form->kindeditor('content', __('标题'))->help("请勿在内容中上传图片！");
		$form->multipleImage('images', __('图片'))->uniqueName()->sortable()->removable();
		$form->number('shares', __('分享次数'));
		//	$form->switch('type', __('Type'))->default(1);
		$form->text('item_id', __('淘宝商品ID'));

		$form->display('item_pic', __('淘宝商品图'))->with(function ($value) {
			if ($value) {
				$imgs = json_decode($value, true);
				$str = '';
				foreach ($imgs as $k => $v) {
					$str .= "<img style='width:100px;' src='" . $v . "' />";
				}
				return $str;
			}

		})->help('自动获取');
		$form->text('item_title', __('淘宝商品标题'))->help('自动获取')->disable();
		$form->select('cate_id', __('分类'))->options(MarketCate::selectOption(['pid' => 4], false))->help('选择分类')->rules('required', ['required' => '请选择分类']);
		//$form->number('publish_id', __('发布人'));
		$form->select('publish_id', __('发布人'))->options(MarketUser::selectOption())->help('选择发布人')->rules('required', ['required' => '请选择发布人']);
		//$form->number('is_jx', __('Is jx'));
		$form->kindeditor('copy_text', __('复制文案'))->help("请勿在内容中上传图片！\$淘口令\$ 在复制时可自动替换为淘口令");
		$form->saving(function (Form $form) {
			$Taobao = new Taobao();
			$item = $Taobao->getItemInfo(['item_id' => '559419631599']);
			if ($item == NULL) {
				$error = new MessageBag([
					'title' => '获取错误',
					'message' => '淘宝商品ID 错误，获取不到商品信息',
				]);
				return back()->with(compact('error'));
			};
			$form->item_pic = isset($item->small_images) ? json_encode($item->small_images, true) : json_encode([], true);
			$form->item_title = isset($item->title) ? $item->title : "";
			$form->copy_text = $form->copy_text ? base64_encode($form->copy_text) : "";
		});
		return $form;
	}
}

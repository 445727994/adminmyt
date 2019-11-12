<?php

namespace App\Tools\Taoke;

use Ixudra\Curl\Facades\Curl;

class Wyt {
	//超级搜索
	static $api = [
		'search' => '/super',
		'shopInfo' => '/itemdetail',
		'order' => '/orderdetails',
	];

	public static function getData($para = [], $apiName) {
		$common_data = [
			'vekey' => 'V00002839Y67282246', //config('coupon.wyt.vekey'),
		];
		$para = array_merge($para, $common_data);
		$api = self::$api[$apiName] ?? '/' . $apiName;
		$resp = Curl::to('http://api.vephp.com/' . $api)
			->withData($para)
			->asJsonResponse(true)
			->get();
		return $resp;
	}

	public static function getShopInfo($itemId, $userType) {
		$data = [
			'shoptype' => $userType == '0' ? 'C' : 'B',
			'para' => $itemId,
			'moreinfo' => 1,
			'onlyglobalinfo' => 1,
		];
		$info = self::getData($data, 'shopInfo');
		if (isset($info['seller'])) {
			return $info['seller'];
		}
		return [];
	}
	public static function choiceCate() {
		$arrCate = [0 =>
			['name' => '热销',
				'child' => ['全部', '美妆', '女装', '男装', '家居', '数码', '鞋包', '内衣', '运动', '食品', '母婴'],
			]
			, 1 => [
				'name' => '优质品',
				'child' => ['全部', '美妆', '女装', '男装', '家居', '数码', '鞋包', '内衣', '运动', '食品', '母婴'],
			]
			, 2 => [
				'name' => '母婴',
				'child' => ['全部', '备孕', '0至6个月', '7至12个月', '1至3岁', '4至6岁', '7至12岁'],
			]
			, 3 => [
				'name' => '特价',
				'child' => '全部',
			],
		];
		return $arrCate;
	}
	public static function sort($num) {
		$arr = [
			'0' => 'tk_rate_des', //按佣金比率 倒叙
			'1' => 'tk_rate_asc', //按佣金比率 顺序
			'2' => 'total_sales_des', // 按销量降序,
			'3' => 'total_sales_asc', //按销量升序,
			'4' => 'coupon_des', //按淘客优惠券降序,
			'5' => 'coupon_asc', // 按淘客优惠券升序,
			'6' => 'price_des', // 按按价格降序,
			'7' => 'price_asc', //price_asc 按价格升序;
		];
		if (isset($arr[$num])) {
			return $arr[$num];
		} else {
			return $arr[0];
		}
	}
}

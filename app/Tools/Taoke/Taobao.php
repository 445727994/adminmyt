<?php

namespace App\Tools\Taoke;

use Illuminate\Support\Facades\Cache;

/**
 *
 */
class Taobao {
	public function getItemInfo(array $array = null) {
		$itemID = request('item_id', data_get($array, 'item_id'));
		$return = Cache::get('ItemInfo' . $itemID);
		if ($return) {
			return $return;
		}
		//直接调用维易淘搜索
		$res = Wyt::getData(['para' => $itemID], 'search');
		if ($res['error'] == 0) {
			if ($res['search_type'] == 2) {
				$res['data']['max_commission_rate'] = $res['data']['commission_rate'];
				$data = json_decode(json_encode($res['data']));
				Cache::set('ItemInfo' . $itemID, $data, 1800);
				return $data;
			}
			if ($res['search_type'] == 1 && isset($res['result_list'][0])) {
				$res['result_list'][0]['max_commission_rate'] = $res['result_list'][0]['commission_rate'] / 100;
				$data = json_decode(json_encode($res['result_list'][0]));
				Cache::set('ItemInfo' . $itemID, $data, 1800);
				return $data;
			}
		}
		return NULL;
	}
}
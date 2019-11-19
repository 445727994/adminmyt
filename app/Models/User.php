<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
	protected $table = 'users';
	protected $fillable = ["id"
		, "app_id"
		, "inviter_id"
		, "group_id"
		, "oldgroup_id"
		, "wx_unionid"
		, "wx_openid1"
		, "wx_openid2"
		, "ali_unionid"
		, "ali_openid1"
		, "ali_openid2"
		, "nickname"
		, "phone"
		, "password"
		, "headimgurl"
		, "is_default"
		, "credit1"
		, "credit2"
		, "credit3"
		, "credit4"
		, "level_id"
		, "realname"
		, "alipay"
		, "status"
		, "invite_code"
		, "remember_token"
		, "expired_time"
		, "signin_time"
		, "max_signin"
		, "created_at"
		, "updated_at"
		, "deleted_at"
		, "credit5"
		, "sign_max"
		, "sign_continuous"
		, "sign_sum"
		, "hmtk_sid"
		, "jiesuan"
		, "group_count"
		, "order_total"
		, "fans"
		, "edu_id"
		, "device_id"
		, "credit6",
	];
	public function level() {
		return $this->belongsTo(Level::class, 'level_id');
	}
	public function inviter() {
		return $this->belongsTo(User::class, 'inviter_id');
	}
	public function group() {
		return $this->belongsTo(User::class, 'group_id');
	}
	public function edu() {
		return $this->belongsTo(User::class, 'edu_id');
	}
	public static function selectOption($where = []) {
		$res = User::where($where)->pluck('nickname', 'id');
		return $res;
	}
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model {
	/**
	 * @var string
	 */
	protected $table = 'user_levels';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'level',
		'name',
		'logo',
		'group_rate1',
		'group_rate2',
		'commission_rate1',
		'commission_rate2',
		'credit',
		'price1',
		'price2',
		'price3',
		'price4',
		'is_commission',
		'is_group',
		'is_pid',
		'default',
		'status',
		'friend1',
		'friend2',
		'friend3',
		'friend4',
		'is_entity',
		'content',
		'is_group_rate2',
		'is_commission_rate2',
		'is_show',
		'introduce',
		'friend_time1',
		'friend_time2',
		'friend_time3',
		'friend_time4',
		'app_id',
		'friend5',
		'friend_time5',
		'friend_commission5',
		'is_change_group',
		'is_buy',
		'is_exchange',
		'is_task',
		'direct_reward',
		'push_reward',
		'group_reward',
	];
	/**
	 * @var array
	 */
	protected $hidden = [
		'user_id',
	];

	/**
	 * @var array
	 */
	protected $dates = ['deleted_at'];
}

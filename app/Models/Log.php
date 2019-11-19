<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model {
	//
	protected $table = 'user_levels';
	protected $fillable = [
		'app_id', 'user_id', 'type', 'credit', 'get_type', 'ordernum', 'status', 'remark', 'type_detail', 'cate_id', 'is_jx', 'cate_pid',
	];
}

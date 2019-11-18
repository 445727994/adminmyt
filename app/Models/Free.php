<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Free extends Model {
	//
	protected $table = 'tbk_free';
	protected $fillable = [
		'id', 'item_id', 'sort', 'is_expire', 'is_delete',
	];
}

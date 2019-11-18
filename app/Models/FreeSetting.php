<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FreeSetting extends Model {
	protected $table = 'plugin_free_settings';
	protected $fillable = [
		'id', 'content',
	];
}

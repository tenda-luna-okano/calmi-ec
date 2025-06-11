<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Subscribe
 * 
 * @property int $subscribe_id
 * @property int $customer_id
 * @property int $subscribe_detail_id
 * @property Carbon $subscribe_start_day
 * @property Carbon $subscribe_end_day
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Subscribe extends Model
{
	protected $table = 'subscribes';
	protected $primaryKey = 'subscribe_id';

	protected $casts = [
		'customer_id' => 'int',
		'subscribe_detail_id' => 'int',
		'subscribe_start_day' => 'datetime',
		'subscribe_end_day' => 'datetime'
	];

	protected $fillable = [
		'customer_id',
		'subscribe_detail_id',
		'subscribe_start_day',
		'subscribe_end_day'
	];
}

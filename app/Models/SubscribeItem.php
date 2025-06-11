<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubscribeItem
 * 
 * @property int $subscribe_item_id
 * @property int $subscribe_detail_id
 * @property int $item_id
 * @property int $item_count
 * @property Carbon $date_subscribe
 *
 * @package App\Models
 */
class SubscribeItem extends Model
{
	protected $table = 'subscribe_items';
	protected $primaryKey = 'subscribe_item_id';
	public $timestamps = false;

	protected $casts = [
		'subscribe_detail_id' => 'int',
		'item_id' => 'int',
		'item_count' => 'int',
		'date_subscribe' => 'datetime'
	];

	protected $fillable = [
		'subscribe_detail_id',
		'item_id',
		'item_count',
		'date_subscribe'
	];
}

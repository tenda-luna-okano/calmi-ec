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
 * @property ItemMaster $item_master
 * @property SubscribeDetailMaster $subscribe_detail_master
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

	public function item_master()
	{
		return $this->belongsTo(ItemMaster::class, 'item_id');
	}

	public function subscribe_detail_master()
	{
		return $this->belongsTo(SubscribeDetailMaster::class, 'subscribe_detail_id');
	}
}

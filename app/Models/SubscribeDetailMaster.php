<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubscribeDetailMaster
 * 
 * @property int $subscribe_detail_id
 * @property string $subscribe_item_name
 * @property int $subscribe_price
 * @property string|null $subscribe_detail_explanation
 * @property string|null $subscribe_img
 * 
 * @property Collection|SubscribeItem[] $subscribe_items
 * @property Collection|Subscribe[] $subscribes
 *
 * @package App\Models
 */
class SubscribeDetailMaster extends Model
{
	protected $table = 'subscribe_detail_masters';
	protected $primaryKey = 'subscribe_detail_id';
	public $timestamps = false;

	protected $casts = [
		'subscribe_price' => 'int'
	];

	protected $fillable = [
		'subscribe_item_name',
		'subscribe_price',
		'subscribe_detail_explanation',
		'subscribe_img'
	];

	public function subscribe_items()
	{
		return $this->hasMany(SubscribeItem::class, 'subscribe_detail_id');
	}

	public function subscribes()
	{
		return $this->hasMany(Subscribe::class, 'subscribe_detail_id');
	}
}

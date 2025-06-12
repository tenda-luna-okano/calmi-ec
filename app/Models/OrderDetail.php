<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class OrderDetail
 * 
 * @property int $order_detail_id
 * @property int $order_id
 * @property int $item_id
 * @property string $item_name
 * @property int $price
 * @property int $price_in_tax
 * @property int $count
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class OrderDetail extends Model
{
	protected $table = 'order_details';
	protected $primaryKey = 'order_detail_id';

	protected $casts = [
		'order_id' => 'int',
		'item_id' => 'int',
		'price' => 'int',
		'price_in_tax' => 'int',
		'count' => 'int'
	];

	protected $fillable = [
		'order_id',
		'item_id',
		'item_name',
		'price',
		'price_in_tax',
		'count'
	];
}

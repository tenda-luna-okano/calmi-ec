<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 * 
 * @property int $order_id
 * @property int|null $payment_name
 * @property int $payment_id
 * @property int $customer_id
 * @property int $delivery_post_number
 * @property string $delivery_states
 * @property string $delivery_municipalities
 * @property string $delivery_building_name
 * @property string $delivery_postage
 * @property int $order_price
 * @property int $order_price_in_tax
 * @property bool $is_paid
 * @property bool $is_delivery
 * @property Carbon $delivery_day
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Customer $customer
 * @property Payment $payment
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';
	protected $primaryKey = 'order_id';

	protected $casts = [
		'payment_name' => 'int',
		'payment_id' => 'int',
		'customer_id' => 'int',
		'delivery_post_number' => 'int',
		'order_price' => 'int',
		'order_price_in_tax' => 'int',
		'is_paid' => 'bool',
		'is_delivery' => 'bool',
		'delivery_day' => 'datetime'
	];

	protected $fillable = [
		'payment_name',
		'payment_id',
		'customer_id',
		'delivery_post_number',
		'delivery_states',
		'delivery_municipalities',
		'delivery_building_name',
		'delivery_postage',
		'order_price',
		'order_price_in_tax',
		'is_paid',
		'is_delivery',
		'delivery_day'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function payment()
	{
		return $this->belongsTo(Payment::class);
	}
}

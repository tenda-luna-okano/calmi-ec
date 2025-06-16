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
 * @property int|null $subscribe_detail_id
 * @property int|null $payment_id
 * @property Carbon $subscribe_start_day
 * @property Carbon $subscribe_end_day
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Customer $customer
 * @property Payment|null $payment
 * @property SubscribeDetailMaster|null $subscribe_detail_master
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
		'payment_id' => 'int',
		'subscribe_start_day' => 'datetime',
		'subscribe_end_day' => 'datetime'
	];

	protected $fillable = [
		'customer_id',
		'subscribe_detail_id',
		'payment_id',
		'subscribe_start_day',
		'subscribe_end_day'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function payment()
	{
		return $this->belongsTo(Payment::class);
	}

	public function subscribe_detail_master()
	{
		return $this->belongsTo(SubscribeDetailMaster::class, 'subscribe_detail_id');
	}
}

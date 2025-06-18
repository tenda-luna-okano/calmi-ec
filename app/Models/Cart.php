<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 * 
 * @property int $cart_id
 * @property int $customer_id
 * @property int $item_id
 * @property int $item_count
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Customer $customer
 * @property ItemMaster $item_master
 *
 * @package App\Models
 */
class Cart extends Model
{
	protected $table = 'carts';
	protected $primaryKey = 'cart_id';

	protected $casts = [
		'customer_id' => 'int',
		'item_id' => 'int',
		'item_count' => 'int'
	];

	protected $fillable = [
		'customer_id',
		'item_id',
		'item_count'
	];

	public function customer()
	{
		return $this->belongsTo(Customer::class);
	}

	public function item_master()
	{
		return $this->belongsTo(ItemMaster::class, 'item_id');
	}
}

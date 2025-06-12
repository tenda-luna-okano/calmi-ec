<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Payment
 * 
 * @property int $payment_id
 * @property string $payment_name
 * @property int|null $card_number
 * @property int|null $expire
 * @property string|null $card_customer_name
 * @property bool $can_use_flg
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Customer[] $customers
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Payment extends Model
{
	protected $table = 'payments';
	protected $primaryKey = 'payment_id';

	protected $casts = [
		'card_number' => 'int',
		'expire' => 'int',
		'can_use_flg' => 'bool'
	];

	protected $fillable = [
		'payment_name',
		'card_number',
		'expire',
		'card_customer_name',
		'can_use_flg'
	];

	public function customers()
	{
		return $this->hasMany(Customer::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}

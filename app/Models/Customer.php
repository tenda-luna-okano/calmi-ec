<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Customer
 * 
 * @property int $customer_id
 * @property string $customer_password
 * @property string $customer_fist_name
 * @property string $customer_last_name
 * @property string $customer_first_furigana
 * @property string $customer_last_furigana
 * @property string $customer_email
 * @property string $customer_tel
 * @property string $customer_birthday
 * @property int $payment_id
 * @property int $customer_post_number
 * @property string $customer_states
 * @property string $customer_municipalities
 * @property string $customer_building_name
 * @property bool $customer_status
 * @property bool $customer_subscribe
 * @property bool $mail_magazine_flg
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Payment $payment
 * @property Collection|Cart[] $carts
 * @property Collection|Order[] $orders
 *
 * @package App\Models
 */
class Customer extends Model
{
	protected $table = 'customers';
	protected $primaryKey = 'customer_id';

	protected $casts = [
		'payment_id' => 'int',
		'customer_post_number' => 'int',
		'customer_status' => 'bool',
		'customer_subscribe' => 'bool',
		'mail_magazine_flg' => 'bool'
	];

	protected $hidden = [
		'customer_password'
	];

	protected $fillable = [
		'customer_password',
		'customer_fist_name',
		'customer_last_name',
		'customer_first_furigana',
		'customer_last_furigana',
		'customer_email',
		'customer_tel',
		'customer_birthday',
		'payment_id',
		'customer_post_number',
		'customer_states',
		'customer_municipalities',
		'customer_building_name',
		'customer_status',
		'customer_subscribe',
		'mail_magazine_flg'
	];

	public function payment()
	{
		return $this->belongsTo(Payment::class);
	}

	public function carts()
	{
		return $this->hasMany(Cart::class);
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}
}

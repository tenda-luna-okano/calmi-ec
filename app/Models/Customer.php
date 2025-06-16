<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class Customer
 * 
 * @property int $customer_id
 * @property string $password
 * @property string $customer_first_name
 * @property string $customer_last_name
 * @property string $customer_first_furigana
 * @property string $customer_last_furigana
 * @property string $email
 * @property string $customer_tel
 * @property Carbon|null $customer_birthday
 * @property int|null $payment_id
 * @property int $customer_post_number
 * @property string $customer_states
 * @property string $customer_municipalities
 * @property string $customer_building_name
 * @property bool $customer_status
 * @property bool $customer_subscribe_flg
 * @property bool $mail_magazine_flg
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at

 * 

 * @property Payment|null $payment
 * @property Collection|Cart[] $carts
 * @property Collection|Notification[] $notifications
 * @property Collection|Order[] $orders
 * @property Collection|Subscribe[] $subscribes
 *
 * @package App\Models
 */

class Customer extends Authenticatable
{
	use SoftDeletes;

	protected $table = 'customers';
	protected $primaryKey = 'customer_id';

	protected $casts = [
		'customer_birthday' => 'datetime',
		'payment_id' => 'int',
		'customer_post_number' => 'int',
		'customer_status' => 'bool',
		'customer_subscribe_flg' => 'bool',
		'mail_magazine_flg' => 'bool'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'password',
		'customer_first_name',
		'customer_last_name',
		'customer_first_furigana',
		'customer_last_furigana',
		'email',
		'customer_tel',
		'customer_birthday',
		'payment_id',
		'customer_post_number',
		'customer_states',
		'customer_municipalities',
		'customer_building_name',
		'customer_status',
		'customer_subscribe_flg',
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

	public function notifications()
	{
		return $this->hasMany(Notification::class, 'send_to');
	}

	public function orders()
	{
		return $this->hasMany(Order::class);
	}

	public function subscribes()
	{
		return $this->hasMany(Subscribe::class);
	}
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class AdminUser
 *
 * @property int $admin_user_id
 * @property string $admin_email
 * @property string $admin_password
 * @property string $admin_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Column[] $columns
 * @property Collection|Notification[] $notifications
 *
 * @package App\Models
 */
class AdminUser extends Authenticatable
{
	protected $table = 'admin_users';
	protected $primaryKey = 'admin_user_id';

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'email',
		'password',
		'admin_name'
	];

	public function columns()
	{
		return $this->hasMany(Column::class);
	}

	public function notifications()
	{
		return $this->hasMany(Notification::class);
	}
}

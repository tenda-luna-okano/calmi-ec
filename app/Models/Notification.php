<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Notification
 * 
 * @property int $notification_id
 * @property string|null $notification_name
 * @property int $admin_user_id
 * @property int $notification_type
 * @property string|null $notification_img
 * @property string $notification_content
 * @property Carbon|null $start_show
 * @property Carbon|null $expire_day
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property AdminUser $admin_user
 *
 * @package App\Models
 */
class Notification extends Model
{
	protected $table = 'notifications';
	protected $primaryKey = 'notification_id';

	protected $casts = [
		'admin_user_id' => 'int',
		'notification_type' => 'int',
		'start_show' => 'datetime',
		'expire_day' => 'datetime'
	];

	protected $fillable = [
		'notification_name',
		'admin_user_id',
		'notification_type',
		'notification_img',
		'notification_content',
		'start_show',
		'expire_day'
	];

	public function admin_user()
	{
		return $this->belongsTo(AdminUser::class);
	}
}

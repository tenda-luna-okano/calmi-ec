<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Column
 * 
 * @property int $column_id
 * @property string $column_name
 * @property int $admin_user_id
 * @property string|null $column_img
 * @property string $column_content
 * @property Carbon|null $start_show
 * @property Carbon|null $expire_day
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property AdminUser $admin_user
 *
 * @package App\Models
 */
class Column extends Model
{
	protected $table = 'columns';
	protected $primaryKey = 'column_id';

	protected $casts = [
		'admin_user_id' => 'int',
		'start_show' => 'datetime',
		'expire_day' => 'datetime'
	];

	protected $fillable = [
		'column_name',
		'admin_user_id',
		'column_img',
		'column_content',
		'start_show',
		'expire_day'
	];

	public function admin_user()
	{
		return $this->belongsTo(AdminUser::class);
	}
}

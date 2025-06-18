<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Sale
 * 
 * @property int $sale_id
 * @property string|null $sale_name
 * @property string $sale_detail_explanation
 * @property Carbon $sale_start_day
 * @property Carbon|null $sale_end_day
 * @property bool $sale_is_enable
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|ItemMaster[] $item_masters
 *
 * @package App\Models
 */
class Sale extends Model
{
	protected $table = 'sales';
	protected $primaryKey = 'sale_id';

	protected $casts = [
		'sale_start_day' => 'datetime',
		'sale_end_day' => 'datetime',
		'sale_is_enable' => 'bool'
	];

	protected $fillable = [
		'sale_name',
		'sale_detail_explanation',
		'sale_start_day',
		'sale_end_day',
		'sale_is_enable'
	];

	public function item_masters()
	{
		return $this->hasMany(ItemMaster::class);
	}
}

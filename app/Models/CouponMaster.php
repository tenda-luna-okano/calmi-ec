<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CouponMaster
 * 
 * @property int $coupon_id
 * @property string $coupon_name
 * @property string $coupon_code
 * @property string|null $coupon_detail_explanation
 * @property bool $coupon_is_enable
 * @property Carbon $coupon_start_day
 * @property Carbon|null $coupon_end_day
 * @property int|null $coupon_stock
 * @property int $coupon_sale_value
 * @property int $coupon_category
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property CategoryMaster $category_master
 *
 * @package App\Models
 */
class CouponMaster extends Model
{
	protected $table = 'coupon_masters';
	protected $primaryKey = 'coupon_id';

	protected $casts = [
		'coupon_is_enable' => 'bool',
		'coupon_start_day' => 'datetime',
		'coupon_end_day' => 'datetime',
		'coupon_stock' => 'int',
		'coupon_sale_value' => 'int',
		'coupon_category' => 'int'
	];

	protected $fillable = [
		'coupon_name',
		'coupon_code',
		'coupon_detail_explanation',
		'coupon_is_enable',
		'coupon_start_day',
		'coupon_end_day',
		'coupon_stock',
		'coupon_sale_value',
		'coupon_category'
	];

	public function category_master()
	{
		return $this->belongsTo(CategoryMaster::class, 'coupon_category');
	}
}

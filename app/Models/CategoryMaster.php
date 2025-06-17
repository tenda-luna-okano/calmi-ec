<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoryMaster
 * 
 * @property int $category_id
 * @property string $category_name
 * 
 * @property Collection|CouponMaster[] $coupon_masters
 * @property Collection|ItemMaster[] $item_masters
 *
 * @package App\Models
 */
class CategoryMaster extends Model
{
	protected $table = 'category_masters';
	protected $primaryKey = 'category_id';
	public $timestamps = false;

	protected $fillable = [
		'category_name'
	];

	public function coupon_masters()
	{
		return $this->hasMany(CouponMaster::class, 'coupon_category');
	}

	public function item_masters()
	{
		return $this->hasMany(ItemMaster::class, 'item_category');
	}
}

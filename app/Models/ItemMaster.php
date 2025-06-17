<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ItemMaster
 * 
 * @property int $item_id
 * @property string $item_name
 * @property int|null $item_category
 * @property int|null $item_price
 * @property int $item_price_in_tax
 * @property bool $seling_flg
 * @property int|null $sale_id
 * @property string|null $item_detail_explanation
 * @property string|null $item_img
 * @property int $item_stock
 * @property float|null $item_review_star
 * @property bool|null $special_subscribe_flg
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property CategoryMaster|null $category_master
 * @property Sale|null $sale
 * @property Collection|Cart[] $carts
 * @property Collection|Review[] $reviews
 * @property Collection|SubscribeItem[] $subscribe_items
 *
 * @package App\Models
 */
class ItemMaster extends Model
{
	protected $table = 'item_masters';
	protected $primaryKey = 'item_id';

	protected $casts = [
		'item_category' => 'int',
		'item_price' => 'int',
		'item_price_in_tax' => 'int',
		'seling_flg' => 'bool',
		'sale_id' => 'int',
		'item_stock' => 'int',
		'item_review_star' => 'float',
		'special_subscribe_flg' => 'bool'
	];

	protected $fillable = [
		'item_name',
		'item_category',
		'item_price',
		'item_price_in_tax',
		'seling_flg',
		'sale_id',
		'item_detail_explanation',
		'item_img',
		'item_stock',
		'item_review_star',
		'special_subscribe_flg'
	];

	public function category_master()
	{
		return $this->belongsTo(CategoryMaster::class, 'item_category');
	}

	public function sale()
	{
		return $this->belongsTo(Sale::class);
	}

	public function carts()
	{
		return $this->hasMany(Cart::class, 'item_id');
	}

	public function reviews()
	{
		return $this->hasMany(Review::class, 'review_item_id');
	}

	public function subscribe_items()
	{
		return $this->hasMany(SubscribeItem::class, 'item_id');
	}
}

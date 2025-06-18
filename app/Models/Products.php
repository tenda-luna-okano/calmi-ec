<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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

class Products extends Model
{
    use HasFactory;

    protected $table = 'item_masters';

    protected $primaryKey = 'item_id';

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
        'item_review_start',
    ];

    protected $guarded = [
        'item_id',
    ];
}

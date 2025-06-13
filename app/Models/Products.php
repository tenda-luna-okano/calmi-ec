<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table = 'item_master'; 

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

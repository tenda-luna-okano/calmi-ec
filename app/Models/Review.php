<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Review
 * 
 * @property int $review_id
 * @property string $review_name
 * @property string $customer_nickname
 * @property int $review_item_id
 * @property int $reviewer_age
 * @property int $review_star
 * @property string $customer_mail
 * @property string $review_content
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property ItemMaster $item_master
 *
 * @package App\Models
 */
class Review extends Model
{
	protected $table = 'reviews';
	protected $primaryKey = 'review_id';

	protected $casts = [
		'review_item_id' => 'int',
		'reviewer_age' => 'int',
		'review_star' => 'int'
	];

	protected $fillable = [
		'review_name',
		'customer_nickname',
		'review_item_id',
		'reviewer_age',
		'review_star',
		'customer_mail',
		'review_content'
	];

	public function item_master()
	{
		return $this->belongsTo(ItemMaster::class, 'review_item_id');
	}
}

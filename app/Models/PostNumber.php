<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PostNumber
 * 
 * @property int $post_number
 * @property string $states
 * @property string $municipalities
 *
 * @package App\Models
 */
class PostNumber extends Model
{
	protected $table = 'post_numbers';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'post_number' => 'int'
	];

	protected $fillable = [
		'post_number',
		'states',
		'municipalities'
	];
}

<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Inquiry
 * 
 * @property int $inquiry_id
 * @property string $customer_nickname
 * @property string $customer_mail
 * @property string $inquiry_content
 * @property bool $answered_flg
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @package App\Models
 */
class Inquiry extends Model
{
	protected $table = 'inquirys';
	protected $primaryKey = 'inquiry_id';

	protected $casts = [
		'answered_flg' => 'bool'
	];

	protected $fillable = [
		'customer_nickname',
		'customer_mail',
		'inquiry_content',
		'answered_flg'
	];
}

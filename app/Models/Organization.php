<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 13 May 2018 12:57:28 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Organization
 * 
 * @property int $id
 * @property string $Name
 * @property string $Address
 * @property string $Phone
 * @property string $Email
 * @property string $Type
 *
 * @package App\Models
 */
class Organization extends Eloquent
{
	protected $table = 'organization';
	public $timestamps = false;

	protected $fillable = [
		'Name',
		'Address',
		'Phone',
		'Email',
		'Type'
	];
}

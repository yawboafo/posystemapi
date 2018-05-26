<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 26 May 2018 17:09:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class User
 * 
 * @property int $id
 * @property string $Name
 * @property string $Dob
 * @property string $Gender
 * @property string $Username
 * @property string $Password
 * @property string $Email
 * @property string $Phone
 * @property string $Address
 * @property string $RoleType
 * @property string $ProfileUrl
 * @property string $LastSignIn
 * @property string $Token
 * @property int $organization_id
 * 
 * @property \App\Models\Organization $organization
 *
 * @package App\Models
 */
class User extends Eloquent
{
	protected $table = 'user';
	public $timestamps = false;

	protected $casts = [
		'organization_id' => 'int'
	];

	protected $fillable = [
		'Name',
		'Dob',
		'Gender',
		'Username',
		'Password',
		'Email',
		'Phone',
		'Address',
		'RoleType',
		'ProfileUrl',
		'LastSignIn',
		'Token',
        'organization_id'
	];

	public function organization()
	{
		return $this->belongsTo(\App\Models\Organization::class);
	}
}

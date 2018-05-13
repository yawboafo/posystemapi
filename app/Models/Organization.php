<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 13 May 2018 02:56:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Organization
 * 
 * @property int $idOrganization
 * @property string $OrganizatioName
 * @property string $OrganizationEmail
 * @property string $OrganizationType
 *
 * @package App\Models
 */
class Organization extends Eloquent
{
	protected $table = 'organization';
	protected $primaryKey = 'idOrganization';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idOrganization' => 'int'
	];

	protected $fillable = [
		'OrganizatioName',
		'OrganizationEmail',
		'OrganizationType'
	];
}

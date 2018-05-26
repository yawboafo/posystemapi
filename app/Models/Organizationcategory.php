<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 26 May 2018 17:09:49 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Organizationcategory
 * 
 * @property int $id
 * @property string $OrganizationCategoryName
 * @property string $OrganizationCategoryType
 * @property string $OrganizationCategoryDescription
 * 
 * @property \Illuminate\Database\Eloquent\Collection $organizations
 *
 * @package App\Models
 */
class Organizationcategory extends Eloquent
{
	protected $table = 'organizationcategory';
	public $timestamps = false;

	protected $fillable = [
		'OrganizationCategoryName',
		'OrganizationCategoryType',
		'OrganizationCategoryDescription'
	];

	public function organizations()
	{
		return $this->hasMany(\App\Models\Organization::class, 'OrganizationCategory_id');
	}
}

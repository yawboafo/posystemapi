<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 13 May 2018 21:43:03 +0000.
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
 * @property int $OrganizationCategory_id
 * 
 * @property \App\Models\Organizationcategory $organizationcategory
 * @property \Illuminate\Database\Eloquent\Collection $categories
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class Organization extends Eloquent
{
	protected $table = 'organization';
	public $timestamps = false;

	protected $casts = [
		'OrganizationCategory_id' => 'int'
	];

	protected $fillable = [
		'Name',
		'Address',
		'Phone',
		'Email',
		'Type'
	];

	public function organizationcategory()
	{
		return $this->belongsTo(\App\Models\Organizationcategory::class, 'OrganizationCategory_id');
	}

	public function categories()
	{
		return $this->hasMany(\App\Models\Category::class, 'Organization_id');
	}

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class, 'Organization_id');
	}
}
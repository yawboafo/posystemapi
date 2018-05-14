<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 13 May 2018 21:43:03 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Category
 * 
 * @property int $idCategory
 * @property string $Name
 * @property string $Description
 * @property string $Thumbnail
 * @property string $ImageUrl
 * @property string $Active
 * @property int $Organization_id
 * 
 * @property \App\Models\Organization $organization
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $table = 'category';
	public $timestamps = false;

	protected $casts = [
		'Organization_id' => 'int'
	];

	protected $fillable = [
		'Name',
		'Description',
		'Thumbnail',
		'ImageUrl',
		'Active',
		'Organization_id'
	];

	public function organization()
	{
		return $this->belongsTo(\App\Models\Organization::class, 'Organization_id');
	}

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class, 'CategoryID');
	}
}

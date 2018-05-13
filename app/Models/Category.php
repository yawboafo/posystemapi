<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 13 May 2018 12:57:28 +0000.
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
 * 
 * @property \Illuminate\Database\Eloquent\Collection $products
 *
 * @package App\Models
 */
class Category extends Eloquent
{
	protected $table = 'category';
	protected $primaryKey = 'idCategory';
	public $timestamps = false;

	protected $fillable = [
		'Name',
		'Description',
		'Thumbnail',
		'ImageUrl',
		'Active'
	];

	public function products()
	{
		return $this->hasMany(\App\Models\Product::class, 'Category_id');
	}
}

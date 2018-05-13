<?php

/**
 * Created by Reliese Model.
 * Date: Sun, 13 May 2018 02:56:05 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Product
 * 
 * @property int $ProductID
 * @property string $SKU
 * @property string $IDSKU
 * @property string $Name
 * @property string $Description
 * @property string $Quantity
 * @property string $UnitPrice
 * @property string $Discount
 * @property string $isAvailable
 * @property string $Ranking
 * @property string $DateCreated
 * @property string $DateUpdated
 * @property string $Thumbnail
 * @property string $ImageUrl
 * @property int $Category_id
 * 
 * @property \App\Models\Category $category
 *
 * @package App\Models
 */
class Product extends Eloquent
{
	public $timestamps = false;

	protected $casts = [
		'Category_id' => 'int'
	];

	protected $fillable = [
		'SKU',
		'IDSKU',
		'Name',
		'Description',
		'Quantity',
		'UnitPrice',
		'Discount',
		'isAvailable',
		'Ranking',
		'DateCreated',
		'DateUpdated',
		'Thumbnail',
		'ImageUrl'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class, 'Category_id');
	}
}

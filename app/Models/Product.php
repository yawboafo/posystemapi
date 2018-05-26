<?php

/**
 * Created by Reliese Model.
 * Date: Sat, 26 May 2018 17:09:49 +0000.
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
 * @property int $Quantity
 * @property float $UnitPrice
 * @property string $Discount
 * @property string $isAvailable
 * @property string $Ranking
 * @property string $Datecreated
 * @property string $DateUpdated
 * @property string $ImageUrl
 * @property int $CategoryID
 * @property int $Organization_id
 * 
 * @property \App\Models\Category $category
 * @property \App\Models\Organization $organization
 *
 * @package App\Models
 */
class Product extends Eloquent
{
	protected $table = 'product';
	public $timestamps = false;

	protected $casts = [
		'Quantity' => 'int',
		'UnitPrice' => 'float',
		'CategoryID' => 'int',
		'Organization_id' => 'int'
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
		'Datecreated',
		'DateUpdated',
		'ImageUrl',
        'Organization_id',
        'CategoryID'
	];

	public function category()
	{
		return $this->belongsTo(\App\Models\Category::class, 'CategoryID');
	}

	public function organization()
	{
		return $this->belongsTo(\App\Models\Organization::class, 'Organization_id');
	}
}

<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;


class ProductModel extends Model
{

    protected $table = 'products';

    public $primaryKey = 'product_id';


    protected $fillable = [
        'name', 'detail','price','image'
    ];

    public function attributeProduct(): HasMany
    {
        return $this->hasMany(ProductAttributeModel::class);
    }
}

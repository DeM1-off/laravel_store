<?php

namespace App\Models\Catalog;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProductAttributeModel extends Model
{

    protected $table = 'products_attribute';

    //Primary key
    public $primaryKey = 'product_attribute_id';


    protected $fillable = [
        'product_id', 'attribute_id'
    ];


    public function attributeProducts(): BelongsTo
    {
        return $this->belongsTo(AttributeModel::class);
    }

    public function attributeProduct(): BelongsTo
    {
        return $this->belongsTo(ProductModel::class);
    }

}

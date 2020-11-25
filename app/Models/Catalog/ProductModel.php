<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{

    protected $table = 'products';

    public $primaryKey = 'product_id';


    protected $fillable = [
        'name', 'detail','price'
    ];
}

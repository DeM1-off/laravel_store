<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{

    protected $table = 'products';


    protected $fillable = [
        'name', 'detail','price'
    ];
}

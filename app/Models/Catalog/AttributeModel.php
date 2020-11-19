<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeModel extends Model
{
    protected $table = 'attributes';


    protected $fillable = [
        'name_attribute', 'detail_attribute'
    ];
}

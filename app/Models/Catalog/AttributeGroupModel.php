<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttributeGroupModel extends Model
{
    protected $table = 'attribute_groups';


    protected $fillable = [
        'name_attribute_group', 'detail_attribute_group'
    ];
}

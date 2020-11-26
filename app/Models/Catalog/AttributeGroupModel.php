<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AttributeGroupModel extends Model
{
    protected $table = 'attribute_groups';

   //Primary key
    public $primaryKey = 'attribute_group_id';


    protected $fillable = [
        'name_attribute_group',
        'detail_attribute_group'
    ];

    public function attribute(): HasMany
    {
        return $this->hasMany(AttributeModel::class);
    }

    public function productAttribute(): HasMany
    {
        return $this->hasMany(AttributeModel::class);
    }

}

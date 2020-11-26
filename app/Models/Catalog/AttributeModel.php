<?php

namespace App\Models\Catalog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeModel extends Model
{
    protected $table = 'attributes';


    //Primary key
    public $primaryKey = 'attribute_id';


    protected $fillable = [
        'name_attribute', 'detail_attribute', 'attributes_group_id'
    ];


    public function attributeProduct(): BelongsTo
    {
        return $this->belongsTo(AttributeGroupModel::class);
    }

}

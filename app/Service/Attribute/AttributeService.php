<?php


namespace App\Service\Attribute;


use App\Models\Catalog\AttributeGroupModel;
use App\Models\Catalog\AttributeModel;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class AttributeService implements AttributeServiceInterface
{


    /**
     * @return Collection|null
     */
    public function getAttributeGroups(): ?Collection
    {
        return AttributeGroupModel::all();
    }

    /**
     * @return \Illuminate\Contracts\Pagination\Paginator|mixed
     */
    public function getAllInfo()
    {

        $attributes = DB::table('attributes')->select('attributes.attribute_id','name_attribute','detail_attribute','name_attribute_group')
            ->leftJoin('attribute_groups', 'attribute_groups.attribute_group_id', '=', 'attributes.attributes_group_id')->simplePaginate(5);
        return $attributes;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function showAttribute($id)
    {
        $selects = AttributeModel::where('attributes.attribute_id', $id)
            ->join('attribute_groups', 'attribute_groups.attribute_group_id', '=', 'attributes.attributes_group_id')
            ->get();


        return $selects;
    }


}

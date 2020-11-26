<?php


namespace App\Service\Attribute;


use App\Models\Catalog\AttributeGroupModel;
use App\Models\Catalog\AttributeModel;
use Illuminate\Database\Eloquent\Collection;

interface AttributeServiceInterface
{

    /**
     * @return Collection|null
     */
    public function getAttributeGroups(): ?Collection;


    /**
     * @return mixed
     */
    public function getAllInfo();

    /**
     * @param $id
     * @return mixed
     */
    public function showAttribute($id);


}

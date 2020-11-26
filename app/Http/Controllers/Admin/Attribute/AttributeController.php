<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Http\Controllers\Controller;
use App\Models\Catalog\AttributeGroupModel;
use App\Models\Catalog\AttributeModel;
use App\Service\Attribute\AttributeServiceInterface;
use Illuminate\Http\Request;


class AttributeController extends Controller
{


    /**
     * @var AttributeServiceInterface
     */
    private $attributeService;

    /**
     * AttributeController constructor.
     * @param AttributeServiceInterface $attributeService
     */
    public function __construct(AttributeServiceInterface $attributeService)
    {
        $this->attributeService = $attributeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $attributes = $this->attributeService->getAllInfo();

        return view('admin/catalog/attribute/index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = $this->attributeService->getAttributeGroups();


        return view('admin/catalog/attribute/create', compact('attributes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name_attribute' => 'required',
            'detail_attribute' => 'required',
            'attributes_group_id' => 'required'
        ]);

        AttributeModel::create($request->all());

        return redirect()->route('attribute.index')
            ->with('success','Attribute created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $attributess = $this->attributeService->showAttribute($id);

        foreach ($attributess as $key => $attribute) {

            $attributes = $attribute;

        }

        return view('admin/catalog/attribute/show', compact('attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $attribute_group = $this->attributeService->getAttributeGroups();

        $attributes = AttributeModel::findOrFail($id);

        return view('admin/catalog/attribute/edit', compact('attributes','attribute_group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = AttributeModel::findOrFail($id);
        $attributes->update($request->all());

        return redirect()->route('attribute.index')
            ->with('success','Attribute updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attributes = AttributeModel::findOrFail($id);
        $attributes->delete();
        return redirect(route('attribute.index'));
    }
}

<?php

namespace App\Http\Controllers\Admin\Attribute;

use App\Http\Controllers\Controller;
use App\Models\Catalog\AttributeGroupModel;
use Illuminate\Http\Request;

class AttributeGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attributes = AttributeGroupModel::all();

        return view('admin/catalog/attribute_group/index', compact('attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/catalog/attribute_group/create');
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
            'name_attribute_group' => 'required',
            'detail_attribute_group' => 'required'
        ]);

        AttributeGroupModel::create($request->all());

        return redirect()->route('attribute_group.index')
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
        $attributes = AttributeGroupModel::findOrFail($id);

        return view('admin/catalog/attribute_group/show',compact('attributes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $attributes = AttributeGroupModel::findOrFail($id);

        return view('admin/catalog/attribute_group/edit', compact('attributes'));
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
        $attributes = AttributeGroupModel::findOrFail($id);

        $attributes->update($request->all());

        return redirect()->route('attribute_group.index')
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
        $attributes = AttributeGroupModel::findOrFail($id);
        $attributes->delete();
        return redirect(route('attribute_group.index'));
    }
}

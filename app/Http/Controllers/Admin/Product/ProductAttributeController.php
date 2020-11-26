<?php

namespace App\Http\Controllers\Admin\Product;

use App\Models\Catalog\AttributeGroupModel;
use App\Models\Catalog\AttributeModel;
use App\Models\Catalog\ProductAttributeModel;
use App\Models\Catalog\ProductModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ProductAttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = DB::table('products_attribute')->select('products_attribute.product_attribute_id','products.name','attributes.name_attribute')
            ->leftJoin('products', 'products.product_id', '=', 'products_attribute.product_id')
            ->leftJoin('attributes', 'attributes.attribute_id', '=', 'products_attribute.attribute_id')
            ->simplePaginate(5);


        return view('admin/catalog/product_attribute/index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $attributes = AttributeModel::all();
        $products = ProductModel::all();


        return view('admin/catalog/product_attribute/create', compact('attributes','products'));

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
            'product_id' => 'required',
            'attribute_id' => 'required'
        ]);

        ProductAttributeModel::create($request->all());

        return redirect()->route('product_attribute.index')
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

        $products_attribute = ProductAttributeModel::where('products_attribute.product_attribute_id', $id)
            ->join('products', 'products.product_id', '=', 'products_attribute.product_id')
            ->join('attributes', 'attributes.attribute_id', '=', 'products_attribute.attribute_id')
            ->get();

        foreach ($products_attribute as $key => $products) {

            $product = $products;

        }

        return view('admin/catalog/product_attribute/show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = ProductAttributeModel::findOrFail($id);
        $products->delete();
        return redirect(route('product_attribute.index'));
    }
}

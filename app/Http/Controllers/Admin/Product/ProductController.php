<?php

namespace App\Http\Controllers\Admin\Product;

use App\Http\Controllers\Controller;
use App\Models\Catalog\ProductAttributeModel;
use App\Service\Product\ProductServiceIntarface;
use Illuminate\Http\Request;
use App\Models\Catalog\ProductModel;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{


    private $productService;

    public function __construct(ProductServiceIntarface $productService)
    {
        $this->productService = $productService;
    }


    /**
     * Display a listing of the resource.ro
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ProductModel::simplePaginate(5);

        return view('admin/catalog/product/index', compact('products'));

    }

    /**
     *
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/catalog/product/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

       $this->productService->createProduct($request);

        return redirect()->route('product.index')
            ->with('success','Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


        $this->productService->updateProduct($request, $id);


        return view('admin/catalog/product/show',compact('products'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = ProductModel::findOrFail($id);

        return view('admin/catalog/product/edit', compact('products'));
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

       $this->productService->updateProduct($request, $id);

        return redirect()->route('product.index')
            ->with('success','Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = ProductModel::findOrFail($id);
        $products->delete();
        return redirect(route('product.index'));
    }
}

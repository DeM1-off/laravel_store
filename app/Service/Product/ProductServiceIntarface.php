<?php


namespace App\Service\Product;



use Illuminate\Http\Request;

interface ProductServiceIntarface
{

    public function createProduct(Request $request);

    public function  updateProduct(Request $request, $id);

}

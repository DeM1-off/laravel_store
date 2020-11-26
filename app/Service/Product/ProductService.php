<?php


namespace App\Service\Product;


use App\Models\Catalog\ProductModel;
use Illuminate\Http\Request;

class ProductService implements ProductServiceIntarface
{

    public function createProduct($request)
    {

        $product = new ProductModel();

        $product->name =   $request->input('name');
        $product->detail = $request->input('detail');
        $product->price =  $request->input('price');

        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid(). '.'. $extension;
            $file->move('upload/image/',$filename);
            $product->image = $filename;
        }
        else
        {
            $product->image = '';
        }


        $product->save();

    }

    public function  updateProduct(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
            'price' => 'required',
        ]);
        $update = ['name' => $request->name, 'detail' => $request->detail,'price' => $request->price];
        if ($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = uniqid(). '.'. $extension;
            $file->move('upload/image/',$filename);
            $update['image'] = $filename;
        }
        else
        {
            $update['image'] = '';
        }

        $update['name'] = $request->input('name');
        $update['detail'] = $request->input('detail');
        $update['price'] = $request->input('price');

        ProductModel::where('product_id',$id)->update($update);
    }



}

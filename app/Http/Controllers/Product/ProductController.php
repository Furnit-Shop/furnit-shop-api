<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function postProduct(Request $request){
        $request->validate([
           'product_name'=>'required',
            'product_image'=>'required',
            'product_price'=>'required',
            'product_sate'=>'required'

        ]);
        $product = ProductModel::create([
            'product_name'=>$request->product_name,
            'product_image'=>$request->product_image,
            'product_price'=>$request->product_price,
            'product_sate'=>$request->product_sate

        ]);
        return response([
            'mgs'=>"Created Done!",
            'product'=>$product
        ]);
    }
    public function getProduct(){
        return ProductModel::all();
    }

}

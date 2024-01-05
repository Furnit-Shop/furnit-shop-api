<?php

namespace App\Http\Controllers\seller\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductModel;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function postProduct(Request $request){
        $request->validate([
           'product_name'=>'required',
            'product_image'=>'required',
            'product_qty'=>'required',
            'product_price'=>'required',
            'product_sate'=>'required'

        ]);
        $product = ProductModel::create([
            'product_name'=>$request->product_name,
            'product_image'=>$request->product_image,
            'product_qty'=>$request->product_qty,
            'product_price'=>$request->product_price,
            'product_sate'=>$request->product_sate

        ]);
        return response([
            'mgs'=>"Created Done!",
            'product'=>$product
        ]);
    }
    /* public function favoriteProduct(Request $request, $productId)
    {
        $product = ProductModel::findOrFail($productId);
        $user = auth()->user(); // Get the authenticated user

        // Attach the product to the user's favorites
        $user->favorites()->attach($product);

        return response()->json(['message' => 'Product favorited successfully']);
    }
    public function getUserFavorites()
    {
        $user = auth()->user(); // Get the authenticated user

        $favorites = $user->favorites()->get();

        return response()->json(['favorites' => $favorites]);
    }
    */
    public function getProduct(){
        return ProductModel::all();
    }
    public function searchProduct(Request $request)
    {
        $query = $request->input('query'); // Get the search query from request

        $results = ProductModel::where('product_name', "%$query%") // Adjust 'name' to the column you want to search
        ->get();

        return response()->json(['results' => $results]);
    }


}

<?php

namespace App\Http\Controllers\seller\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function postProduct(Request $request){
        $request->validate([
           'product_name'=>'required',
            'product_description'=>'required',
            'product_image'=>'required',
            'product_qty'=>'required',
            'product_price'=>'required',
            'product_sate'=>'required'

        ]);
        $product = ProductModel::create([
            'product_name'=>$request->product_name,
            'product_description'=>$request->product_description,
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
    public function getProduct(){
        return response([
            'product'=> ProductModel::all()
        ]);
    }
    public function productCard()
    {
        $product = DB::select('SELECT id, product_name, product_image, product_price FROM products');
        return response([
            "productCard"=>$product
        ]);

    }
    public function deletePrduct($id) {
        $product = ProductModel::find($id);

        if (!$product) {
            return response()->json(['message' => 'Product not found'], 404);
        }

        $product->delete();

        return response()->json(['message' => 'Product deleted successfully'], 200);
    }

    public function searchProduct(Request $request)
    {
        $query = $request->input('query'); // Get the search query from request

        $results = ProductModel::where('product_name', "%$query%") // Adjust 'name' to the column you want to search
        ->get();

        return response([
            'result'=>$results
        ]);
    }
    public function search(Request $request)
    {
        $query = ProductModel::query()
            ->when(request('search'), function ($query, $search) {
                $query->whereFullText(['product_name', 'product_description'], $search);
            }, function ($query) {
                $query->latest();
            });

        return response([
            'product'=>$query
        ]);
    }

    public function searchQuery($query)
    {
        $result = ProductModel::search($query)->get();

        return response([
            'searchPro'=>$result
        ]);

    }
}

<?php

namespace App\Http\Controllers\Booking;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function bookingProduct(){
        $booking = DB::select('SELECT id FROM products');
        if ($booking == 1){
            return response([
                'data'=>$booking
            ]);
        }
        else if ($booking > 1){
            return $booking;
        }
    }
}

<?php

namespace App\Http\Controllers\seller\Booking;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function bookingProduct(){
        $booking = DB::select('SELECT product_price FROM products');
        $qty = 1;
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

<?php

namespace App\Http\Controllers\Testing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function TestApp(Request $request)
    {
      return response([
          "header" => "Test API"
      ]);
    }
}

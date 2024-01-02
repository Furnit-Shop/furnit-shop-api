<?php

namespace App\Http\Controllers\user\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AutCostumerController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name'=>'required|string|min:2|max:100',
            'email'=>'required|string|unique:users|email',
            'phone_number'=>'required|string|',
            'password'=>'required|string|min:8|max:10'
        ]);
        $user_exist = User::where('email', $request->email)->first();
        if($user_exist){
            return response([
                'message'=>'Create Success!',
                'success'=>false
            ]);
        }
        $user = User::create([
            "name"=>$request->name,
            'email'=>$request->email,
            'phone_number'=>$request->phone_number,
            'password'=>Hash::make($request->password),
        ]);
        return response([
            'message'=>'Create Success',
            'success'=>true,
            '$user'=>$user
        ]);
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|string',
            'password'=>'required|string'
        ]);
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return response([
                'message'=>'User Not Found!',
                'success'=>false
            ]);
        }
        if(Hash::check($request->password, $user->password)){
            $token = $user->createToken('authToken')->plainTextToken;

            return response([
                'message'=>'Longin Success',
                'success'=>true,
                'user'=>$user,
                'token'=>$token,
            ]);
        }
        return response([
            'message'=>'Email and Password  not found!',
            'success'=>false,
        ]);
    }
    public function getAllUser(Request $request){
        return User::all();
    }
    public function profileUser(){
        $user = DB::select('SELECT id, name, email, phone_number FROM users');
        return response([
            'msg'=>'Get data',
            'profile'=>$user
        ]);
    }
}

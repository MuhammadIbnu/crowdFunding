<?php

namespace App\Http\Controllers\Api;

use App\Models\Donatur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    //
    public function login(Request $request){

        $validator = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            # code...
            return response()->json($validator->errors(), 400);
        }

        $donatur = Donatur::where('email',$request->email)->first();

        if (!$donatur || !Hash::check($request->password, $donatur->password)) {
            # code...
            return response()->json([
                'success'  => false,
                'message'  => 'Login Failed!'
            ], 400);
        }

        return response()->json([
            'success'  => true,
            'message'  => 'Login Berhasil',
            'data'     => $donatur,
            'token'    => $donatur->createToken('authToken')->accessToken
        ], 200);
    }

    public function logout(Request $request){
        $removeToken = $request->user()->tokens()->delete();
        if ($removeToken) {
            # code...
            return response()->json([
                'success'   => true,
                'message'   =>'Logout Berhasil'
            ], 200, $headers);
        } 
    }
}

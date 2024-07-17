<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    //

    public function login(Request $request){
    //     if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
    //         $user = Auth::user();
    //         $success['token'] = $user->createToken('appToken')->accessToken;
    //         //After successfull authentication
    //         return response()->json([
    //           'success' => true,
    //           'token' => $success,
    //           'user' => $user
    //       ]);
    //     } else {
    //     //if authentication is unsuccessfull
    //       return response()->json([
    //         'success' => false,
    //         'message' => 'Invalid Email or Password',
    //     ], 401);
    //     }
      }
}

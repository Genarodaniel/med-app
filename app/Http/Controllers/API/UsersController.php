<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function getToken(Request $request)
    {
        if(empty($request->email) || empty($request->password)){
            return response()->json([
                'error' => true,
                'message' => 'You must provide an email and password to get token'
            ],400);
        }

        if(auth()->attempt(['email' => $request->email,
        'password' => $request->password])){

            $token = auth()->user()->createToken('api');
            $token->token->save();

            return response()->json([
                'error'     => false,
                'token'     => $token->accessToken,
                'expire_at' => $token->token->expires_at->format('Y-m-d H:i:s')
            ], 200);

        }else{
            return response()->json([
                'error' => true,
                'message' => 'Credentials doesn\'t matches'
            ], 401);
        }

    }
}

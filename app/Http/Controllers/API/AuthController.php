<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Auth;

class AuthController extends Controller
{

	public function login(Request $request){
		$request->validate([
            'password' => 'required|string',
            'email' => 'required|string|email',
        ]);

        if (!Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return response()->json([
                'message' => 'Invalid username/password',
                'status_code' => 401
            ], 401);
        }

        $user = $request->user();

        $tokenData = $user->createToken('Personal Access Token', ['user']);
        $token = $tokenData->token;
        // add expired day
        $token->expired_at = Carbon::now()->addWeeks();

        if ($token->save()){
            return response()->json([
                'user' => $user,
                'access_token' => $tokenData->accessToken,
                'token_type' => 'Bearer',
                'token_scope' => $tokenData->token->scope[0],
                'expired_at' => Carbon::parse($tokenData->token->expired_at)->toDayDateTimeString(),
                'status_code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Some error occurred, try again',
                'status_code' => 500
            ], 500);
        }
	}

	public function register(Request $request){

		$request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email',
            'password' => 'required|string|min:8'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;

        if ($user->save()){
            return response()->json([
                'message' => 'User created successfully',
                'status_code' => 200
            ], 200);
        } else {
            return response()->json([
                'message' => 'Error creating new user',
                'status_code' => 500
            ], 500);
        }
	}

	public function logout(Request $request){
		$request->user()->tokens()->revoke();
        return response()->json([
            'message' => 'Logout successfully',
            'status_code' => 200
        ], 200);
	}

}
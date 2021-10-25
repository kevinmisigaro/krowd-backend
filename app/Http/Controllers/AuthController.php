<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\Attendant;

class AuthController extends Controller
{
    public function registerPartyGoer(Request $request){
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        
        if($user->save()){

            $attendant = new Attendant;
            $attendant->user_id = $user->id;
            $attendant->username = $request->username;
            $attendant->country_id = 1;
            $attendant->save();

            return response()->json([
                'user' => $user,
                'token' => $user->createToken($request->device_name)->plainTextToken
            ], 201);
        }

        return \response()->json('Failed to register user', 401);
    }

    public function logout(Request $request){
        $user = User::where('id', $request->user()->id)->first();
        $user->tokens()->delete();

        return response()->json('Logged out', 200);
    }

    public function login(Request $request){

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
            'device_name' => 'required',
        ]);

        if($validator->fails()){
            return \response()->json('Please fill all fields', 406);
        }
    
        $attendant = Attendant::where('username', $request->username)->with('user')->first();
    
        if (! $attendant->user || ! Hash::check($request->password, $attendant->user->password)) {
            return \response()->json(["message"=>"The provided credentials are incorrect."], 404);
        }
            
        return response()->json([
            'user' => $attendant->user,
            'token' => $attendant->user->createToken($request->device_name)->plainTextToken
        ],200);
    }
}

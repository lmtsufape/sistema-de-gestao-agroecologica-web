<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class PassportAuthController extends Controller
{
    public function register(Request $request){
        $this->validate($request,[
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = User::create([
            'nome' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $token = $user->createToken('Laravel8PassportAuth')->accessToken;
  
        return response()->json(['token' => $token], 200);
    }

    public function login(Request $request){
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(auth()->attempt($data)){
            $token = auth()->user()->createToken('Laravel8PassportAuth')->accessToken;
            return response()->json(['token' => $token], 200);
        } else{
            return response()->json(['error' => 'Unauthorised'], 401);
        }

    }

    public function userInfo(){
        $user = auth()->user();   
        return response()->json(['user' => $user], 200);
    }

    public function index(){
        return response()->json(['ok' => 'Online', 200]);
    }
}

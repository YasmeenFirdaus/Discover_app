<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    public function register(Request $request){
        $request->validate([
            "name"=> "required",
            "email"=> "required|email|unique:users",
            "password"=>"required|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@!%*?&])[A-Za-z\d@!%*?&]{8,}$/"
            ,
            'confirm_password' => 'required|same:password',
        ]);
      
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
        ]);
    
        return response()->json([
            "status" => true,
            'message' => 'Registration successful'], 201);
    
        }
    
        public function login(Request $request){
            $request->validate([
                "email"=> "required|email|",
                "password"=>"required",
                
               ]);
    
                if(Auth::attempt([
                    "email" => $request->email,
                    "password" => $request->password,
                    ])){
                        $user= Auth::user();     
                        $token=$user->createToken("mytoken")->accessToken;
                        return response()->json([
                            "status"=>true,
                            "message"=>"user logged in successfully",
                            "token=> $token"
                        ]);
                    }else{
                        return resonse()->json([
                            "status"=>false,
                            "message"=> "Invalid login details"
                        ]);
                    }
    
        }
    
        public function profile(){
    $user=Auth::user();
    return response()-> json([
        "status"=> true,
        "message"=>"profile information",
        "data"=> $user
    ]);
    
    
        }
    
        public function logout(){
    
            auth()->user()-> token()->revoke();
            return response()-> json([
                "status"=> true,
                "message"=>"user logged out",
            ]);
    
        }
}

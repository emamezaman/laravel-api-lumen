<?php

namespace App\Http\Controllers\v1;
use App\Http\Resources\v1\UserResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
 
use Illuminate\Support\Str;

 

class UserController extends Controller
{
    public function login(Request $request ){

    	 $data= $this->validate($request,[
          'email'=>'required|exists:users|string|email',
          'password'=>'required|string|min:6'
    	]);


        $user = User::whereEmail($data['email'])->firstOrFail();
 
          if(Hash::check($data['password'],$user->password))
         
        {
        
            $user->update(['api_token'=>Str::random(60)]);
            return new UserResource($user);
        }

    return response(['data'=>'اطلاعات صحیصح نیست','status'=>'error'],403);

    }

    public function register(Request $request)
    {
    	$data = $this->validate($request,[
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
    	]);
        $user = User::create([
           'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'api_token' =>Str::random(60),
            'remember_token' =>Str::random(60)
        ]);
 

         
    	  return new UserResource($user);

    }

    public function user(){
         return \Auth::user()->name;
    } 
}

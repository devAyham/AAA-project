<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use  App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Validator ;
// use Dotenv\Validator as Validator;

class RegisterController extends BaseController
{
    public function register(Request $request){
        $validator = Validator::make($request-> all(),[
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
            'phone' => 'nullable',
            'img' => 'nullable',

        ]);
        if ($validator->fails()){
            return $this->sendError('please validate error ' , $validator->errors());
        }
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);
        $success['token'] = $user->createToken('AyhamAseelAmgad')->accessToken;
        $success['name'] = $user->first_name;

    return $this->sendResponse($success , 'User registered successfully !');

    }

    public function login(Request $request){
        if(Auth::attempt(['email' =>$request->email, 'password' => $request->password]))
        {
            $user = Auth::user();
            $success['token'] = $user->createToken('AyhamAseelAmgad')->accessToken;
            $success['name'] = $user->first_name;
            return $this->sendResponse($success , 'User registered successfully !');
        }
        else{
        return $this->sendError('please check your auth' , ['error' => 'Unauthorrised']);
        }



    }
}

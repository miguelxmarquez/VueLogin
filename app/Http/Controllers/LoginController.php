<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Support\Facades\Auth;
use App\Http\Requests\LoginFormRequest;

class LoginController extends Controller
{
    //




    public function loging(LoginFormRequest $request){


        if (Auth::attempt([ 'email' => $request->email, 'password' => $request->password, false ])) {

            return response()->json('Has iniciado sesión', 200);
        } else {

            return response()->json(['errors' => ['login' => 'Los datos son incorrectos']], 422);
        }




        
    }


}

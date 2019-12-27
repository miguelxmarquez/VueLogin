<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; 
use App\Http\Requests\LoginFormRequest;

class LoginController extends Controller
{
    //




    public function loging(LoginFormRequest $request){

        return response()->json($request, 200);
        
    }


}

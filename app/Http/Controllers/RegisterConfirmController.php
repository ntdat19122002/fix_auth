<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterConfirmController extends Controller
{
    public function register_confirm(Request $request){
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        return view('auth.register-confirm', compact('name','email','password'));
    }
}

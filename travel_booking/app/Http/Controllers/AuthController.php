<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;

class AuthController extends Controller
{

    public function showSignUpForm()
    {
        return view('auth.signup');
    }

    public function signUp(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        // print_r($user);

        return redirect('/dashboard');

    }

    public function showLoginForm(){

    }

    public function login(){

    }

    public function Logout(){

    }

}

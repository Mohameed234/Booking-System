<?php

namespace App\Http\Controllers;

use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\SignupRequest;
use App\Http\Requests\LoginRequest;

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

        auth()->login($user);



        return redirect('/dashboard');

    }

    public function showLoginForm(){

        return view('auth.signin');
    }

    public function login(LoginRequest $request){

        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)){

            $request->session()->regenerate();

            return redirect('/dashboard');
        }else{

            return back()->withErrors(['message' => 'Invalid credentials'])->withInput();
        }



    }

    public function Logout(){

    }

}

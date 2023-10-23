<?php

namespace App\Http\Controllers;

use App\HttpModels\login;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('home.login');
    }

    public function auth(Request $request)
    {
        $email=$request->post('email');
        $password=$request->post('password');

        $result=login::where(['email'=>$email, 'password'=>$password])->get();
        echo '<pre>';
        print_r($result);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Http\Models\Login;
use Illuminate\Http\Request;
use App\Http\Models\Admin;
use App\Http\Models\Donors;

class LoginController extends Controller
{
    public function index()
    {
        return view('home.login');
    }

    public function donors(Request $data)
    {
        $newUser=new User();
        $newUser->role="donor";
        $newUser->name=$data->input('name');
        $newUser->email=$data->input('email');
        $newUser->password=$data->input('password');
        $newUser->picture=$data->file('file')->getClientOriginalName();
        $data->file('file')->move('uploads/profiles/',$newUser->picture);
        if($newUser->save())
        {
            return redirect('donors')->with('success','Congratulations! Your account is ready.');
        }
        else
            return view('home.login');
    }
}
